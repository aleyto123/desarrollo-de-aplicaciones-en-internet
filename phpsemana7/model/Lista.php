<?php
class Lista {
    private $mysqli;
    private $tabla = "usuarios";
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $base_de_datos = "usuarios_db";

    public function __construct() {
        $this->mysqli = new mysqli($this->host, $this->usuario, $this->clave, $this->base_de_datos);
        if ($this->mysqli->connect_error) {
            die("Error de conexión: " . $this->mysqli->connect_error);
        }
    }

    public function agregarUsuario($nombre, $correo, $clave) {
        $clave_hash = password_hash($clave, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $this->tabla (nombre, correo, clave) VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("sss", $nombre, $correo, $clave_hash);
        $stmt->execute();
        $stmt->close();
    }

    public function obtenerUsuarios() {
        $sql = "SELECT id, nombre, correo FROM $this->tabla";
        $result = $this->mysqli->query($sql);
        $usuarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        return $usuarios;
    }

    public function verificarCredenciales($correo, $clave) {
        $sql = "SELECT id, nombre, correo, clave FROM $this->tabla WHERE correo = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();
            if (password_verify($clave, $usuario['clave'])) {
                return $usuario;
            }
        }
        return null;
    }

    public function __destruct() {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }
}
?>