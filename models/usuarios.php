<?php
require_once "../../../database/database.php";

class Usuarios {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerUsuariosActivos() {
        $sql = "SELECT * FROM usuarios WHERE codigo = 1";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function obtenerUsuariosInactivos() {
        $sql = "SELECT * FROM usuarios WHERE codigo = 2";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function obtenerUsuariosEnEspera() {
        $sql = "SELECT * FROM usuarios WHERE codigo = 3";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>