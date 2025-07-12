<?php include("../layout/header.php"); ?>
<form method="post">
    <input type="text" name="username" required placeholder="Usuario"><br>
    <input type="password" name="password" required placeholder="Contraseña"><br>
    <input type="submit" value="Ingresar">
</form>

<?php
if ($_POST) {
    require_once("../../controladores/UsuarioController.php");
    $uc = new UsuarioController();
    $uc->login();
}
?>
