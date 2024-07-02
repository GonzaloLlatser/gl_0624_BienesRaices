<?php

// Funcion Conectar a la BBDD
function conectarBD(): mysqli
{
  $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');
  // Confirmacion de conexion
  if (!$db) {
    echo "Error en la Conexión";
    exit;
  }
  // Retorna el valor de la instancia 
  return $db;
}
