<?php
require_once "../../database/database.php";

class Upload
{
	private $conn;

	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function procesarArchivo($archivo)
	{
		if (!file_exists($archivo) || !is_readable($archivo)) {
			header("Location: ../views/index.php?error=El archivo no es válido o no se puede leer");
			exit();
		}

		$errores = [];
		$usuarios = [];

		if (($handle = fopen($archivo, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$email = trim($data[0]);
				$nombre = trim($data[1]);
				$apellido = trim($data[2]);
				$codigo = isset($data[3]) ? trim($data[3]) : null;
				$idRevisor = trim($data[4]);
				// Verificar el código
				if (empty($codigo)) {
					$errores[] = "El código para el usuario $nombre $apellido no se encuentra.";
				} elseif (!in_array($codigo, ['1', '2', '3'])) {
					$errores[] = "El código '$codigo' del usuario $nombre $apellido es inválido. Debe ser 1, 2 o 3.";
				} else {
					// Si no hay errores, agregamos el usuario al array de usuarios válidos
					$usuarios[] = [
						'email' => $email,
						'nombre' => $nombre,
						'apellido' => $apellido,
						'codigo' => $codigo,
						'id_revisor' => $idRevisor
					];
				}
			}
			fclose($handle);
		}
		// Si hay errores, redirigimos a la página con los errores en la URL
		if (!empty($errores)) {
			$queryString = http_build_query(['errores' => $errores]);
			header("Location: ../views/index.php?$queryString");
			exit();
		}

		// Si no hay errores, procedemos a insertar los usuarios válidos en la base de datos
		if (!empty($usuarios)) {
			foreach ($usuarios as $usuario) {
				$sql = "INSERT INTO usuarios (email, nombre, apellido, codigo, id_revisor) VALUES (?, ?, ?, ?, ?)";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute([$usuario['email'], $usuario['nombre'], $usuario['apellido'], $usuario['codigo'], $usuario['id_revisor']]);
			}
		}

		// Si no hay errores, redirigir a la vista de usuarios
		header("Location: ../views/users/index.php");
		exit();
	}
}
