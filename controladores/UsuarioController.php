<?php
require_once("modelos/Usuario.php");

class UsuarioController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function guardar() {
        return $this->modelo->guardar($_POST);
    }

    public function login() {
        $usuario = $this->modelo->login($_POST['username'], $_POST['password']);
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: ../vistas/usuarios/listar.php");
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }

    public function listar() {
        return $this->modelo->listar();
    }

    public function eliminar($id) {
        return $this->modelo->eliminar($id);
    }

    public function editar($id, $data) {
        return $this->modelo->actualizar($id, $data);
    }
}
