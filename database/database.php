<?php
define("DB_HOST", "localhost");
define("DB_NAME", "form");
define("DB_USER", "root");
define("DB_PASS", "");

try {
    $conn = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    error_log("Error de conexión a la BD: " . $e->getMessage()); // Log en servidor
    exit("Ocurrió un error, contacte al administrador."); // Mensaje genérico para el usuario
}
