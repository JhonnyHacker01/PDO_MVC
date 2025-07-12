<?php
require_once("config/database.php");

class Usuario {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function guardar($data) {
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (username, password, nombres, apellidos, tipo, id_escuela, email)
                VALUES ('{$data['username']}', '$pass', '{$data['nombres']}', '{$data['apellidos']}', '{$data['tipo']}', {$data['id_escuela']}, '{$data['email']}')";
        return $this->pdo->exec($sql);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM usuario WHERE username = '$username'";
        $usuario = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }
        return false;
    }

    public function listar() {
        return $this->pdo->query("SELECT * FROM usuario")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminar($id) {
        return $this->pdo->exec("DELETE FROM usuario WHERE id = $id");
    }

    public function obtener($id) {
        return $this->pdo->query("SELECT * FROM usuario WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $data) {
        $sql = "UPDATE usuario SET 
                    username = '{$data['username']}',
                    nombres = '{$data['nombres']}',
                    apellidos = '{$data['apellidos']}',
                    tipo = '{$data['tipo']}',
                    id_escuela = {$data['id_escuela']},
                    email = '{$data['email']}'
                WHERE id = $id";
        return $this->pdo->exec($sql);
    }
}
