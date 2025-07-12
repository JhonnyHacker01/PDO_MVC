<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once("../../controladores/UsuarioController.php");
$uc = new UsuarioController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uc->editar($_GET['id'], $_POST);
    header("Location: listar.php");
    exit;
}

$usuario = $uc->modelo->obtener($_GET['id']);
?>

<form method="post">
    <input type="text" name="username" value="<?= $usuario['username'] ?>"><br>
    <input type="text" name="nombres" value="<?= $usuario['nombres'] ?>"><br>
    <input type="text" name="apellidos" value="<?= $usuario['apellidos'] ?>"><br>
    <input type="email" name="email" value="<?= $usuario['email'] ?>"><br>
    <select name="tipo">
        <option value="estudiante" <?= $usuario['tipo'] == 'estudiante' ? 'selected' : '' ?>>Estudiante</option>
        <option value="profesor" <?= $usuario['tipo'] == 'profesor' ? 'selected' : '' ?>>Profesor</option>
    </select><br>
    <input type="number" name="id_escuela" value="<?= $usuario['id_escuela'] ?>"><br>
    <input type="submit" value="Guardar cambios">
</form>
