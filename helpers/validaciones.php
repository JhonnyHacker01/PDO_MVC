<?php
function validarCorreo($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validarUsuario($usuario) {
    return preg_match('/^[a-zA-Z0-9_]{4,20}$/', $usuario);
}
