<?php


// Definicion de Constantes 
// __DIR__ => Obtiene la ruta completa
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES', 'funciones.php');

// Definicion de Funciones
function incluirTemplate(string $nombre, bool $inicio = false)
{
  include TEMPLATES_URL . "/{$nombre}.php";
}

// Autenticacion de Usuarios
function estaAutenticado(): bool
{
  session_start();
  $auth = $_SESSION['login'];
  if ($auth) {
    return true;
  }
  return false;
}
