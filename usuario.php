<?php
// Importar conexion
require 'includes/config/database.php';
// Conectar a la BBDD
$db = conectarBD();
// Crear variables con un Email y Pasw 
$email = ' correo@correo.com';
$password = '123456';
// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password');";
// - Copruebo query
echo $query;
// Agregar a la BBDD
mysqli_query($db, $query);
