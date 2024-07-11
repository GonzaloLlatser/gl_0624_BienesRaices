<?php
// Importar conexion
require 'includes/app.php';
// Conectar a la BBDD
$db = conectarBD();
// Crear variables con un Email y Pasw 
$email = 'correo@correo.com';
$password = '123456';
// Hashear Password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);
// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";
// Agregar a la BBDD
mysqli_query($db, $query);
