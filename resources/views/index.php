<?php
require_once "../../controllers/upload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
	$archivoTmp = $_FILES["archivo"]["tmp_name"];
	$upload = new Upload($conn);
	$upload->procesarArchivo($archivoTmp);
	header("Location: ../views/users/index.php"); // Redirigir a la tabla
	exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Subir Usuarios</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/form.css">
	<link rel="stylesheet" href="../css/table.css">
</head>

<body>
	<?php include "components/menu.php"; ?>
	<?php include "components/form.php"; ?>
</body>

</html>