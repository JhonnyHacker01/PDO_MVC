<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once("../../controladores/UsuarioController.php");

if (isset($_GET['id'])) {
    $uc = new UsuarioController();
    $uc->eliminar($_GET['id']);
    header("Location: listar.php");
}
