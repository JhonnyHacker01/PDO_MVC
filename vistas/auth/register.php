<?php include("../layout/header.php"); ?>
<form method="post">
    <input type="text" name="username" required placeholder="Usuario"><br>
    <input type="password" name="password" required placeholder="Contraseña"><br>
    <input type="text" name="nombres" required placeholder="Nombres"><br>
    <input type="text" name="apellidos" required placeholder="Apellidos"><br>
    <input type="email" name="email" placeholder="Correo"><br>
    <select name="tipo">
        <option value="estudiante">Estudiante</option>
        <option value="profesor">Profesor</option>
    </select><br>
    <input type="number" name="id_escuela" placeholder="ID Escuela" required><br>
    <input type="submit" value="Registrar">
</form>

<?php
if ($_POST) {
    require_once("../../controladores/UsuarioController.php");
    $uc = new UsuarioController();
    echo $uc->guardar() ? "Registrado correctamente" : "Error al registrar";
}
?>
