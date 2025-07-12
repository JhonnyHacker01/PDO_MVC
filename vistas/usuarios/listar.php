<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../auth/login.php");
    exit;
}

require_once("../../controladores/UsuarioController.php");
$uc = new UsuarioController();
$usuarios = $uc->listar();
?>
<h2>Usuarios</h2>
<a href="../auth/logout.php">Cerrar sesión</a>
<table border="1">
<tr><th>ID</th><th>Usuario</th><th>Tipo</th><th>Acciones</th></tr>
<?php foreach ($usuarios as $u): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['username'] ?></td>
    <td><?= $u['tipo'] ?></td>
    <td>
        <a href="editar.php?id=<?= $u['id'] ?>">Editar</a>
        <a href="eliminar.php?id=<?= $u['id'] ?>">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
