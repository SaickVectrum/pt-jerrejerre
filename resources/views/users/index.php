<?php
require_once "../../../models/usuarios.php";
$usuarios = new Usuarios($conn);
$listaUsuariosActivos = $usuarios->obtenerUsuariosActivos();
$listaUsuariosInactivos = $usuarios->obtenerUsuariosInactivos();
$listaUsuariosEnEspera = $usuarios->obtenerUsuariosEnEspera();

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Lista de Usuarios</title>
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/table.css">
</head>

<body>
	<?php include "../components/menu.php"; ?>
	<div class="div-button">
		<div class="button-b">
			<a href="../index.php">&lt;&lt; Volver</a>
		</div>
	</div>
	<div class="tables">
		<div class="title-table">
			<h2>Usuarios activos</h2>
		</div>
		<table border="1">
			<thead>
				<tr>
					<th>Email</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Revisor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listaUsuariosActivos as $usuario): ?>
					<tr>
						<td><?= htmlspecialchars($usuario['email']) ?></td>
						<td><?= htmlspecialchars($usuario['nombre']) ?></td>
						<td><?= htmlspecialchars($usuario['apellido']) ?></td>
						<td><?= htmlspecialchars($usuario['nombre_revisor'] . " - " . $usuario['apellido_revisor']) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h2 class="title-table">Usuarios Inactivos</h2>
		<table border="1">
			<thead>
				<tr>
					<th>Email</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Revisor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listaUsuariosInactivos as $usuario): ?>
					<tr>
						<td><?= htmlspecialchars($usuario['email']) ?></td>
						<td><?= htmlspecialchars($usuario['nombre']) ?></td>
						<td><?= htmlspecialchars($usuario['apellido']) ?></td>
						<td><?= htmlspecialchars($usuario['nombre_revisor'] . " - " . $usuario['apellido_revisor']) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<h2 class="title-table">Usuarios en espera</h2>
		<table border="1">
			<thead>
				<tr>
					<th>Email</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Revisor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listaUsuariosEnEspera as $usuario): ?>
					<tr>
						<td><?= htmlspecialchars($usuario['email']) ?></td>
						<td><?= htmlspecialchars($usuario['nombre']) ?></td>
						<td><?= htmlspecialchars($usuario['apellido']) ?></td>
						<td><?= htmlspecialchars($usuario['nombre_revisor'] . " - " . $usuario['apellido_revisor']) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>