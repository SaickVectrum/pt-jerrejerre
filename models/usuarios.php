<?php
require_once "../../../database/database.php";

class Usuarios {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerUsuariosActivos() {
        $sql = "SELECT 
                u.email, 
                u.nombre, 
                u.apellido, 
                r.nombre AS nombre_revisor, 
                r.apellido AS apellido_revisor
            FROM usuarios u
            LEFT JOIN revisores r ON u.id_revisor = r.id
            WHERE u.codigo = 1";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function obtenerUsuariosInactivos() {
        $sql = "SELECT 
                u.email, 
                u.nombre, 
                u.apellido, 
                r.nombre AS nombre_revisor, 
                r.apellido AS apellido_revisor
            FROM usuarios u
            LEFT JOIN revisores r ON u.id_revisor = r.id
            WHERE u.codigo = 2";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

	public function obtenerUsuariosEnEspera() {
        $sql = "SELECT 
                u.email, 
                u.nombre, 
                u.apellido, 
                r.nombre AS nombre_revisor, 
                r.apellido AS apellido_revisor
            FROM usuarios u
            LEFT JOIN revisores r ON u.id_revisor = r.id
            WHERE u.codigo = 3";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>