<?php
session_start();
session_destroy();
header("Location: vistas/auth/login.php");
