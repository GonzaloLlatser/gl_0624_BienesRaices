<?php
echo "HOLAAAAA";
// Inicia Sesion
session_start();
// Reestablece la sesion
$_SESSION = [];

header('Location: /bienesraices/index.php');


