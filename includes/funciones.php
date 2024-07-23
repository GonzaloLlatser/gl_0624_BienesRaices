<?php


// Definicion de Constantes 
// __DIR__ => Obtiene la ruta completa
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES', 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

// Definicion de Funciones
function incluirTemplate(string $nombre, bool $inicio = false)
{
  include TEMPLATES_URL . "/{$nombre}.php";
}

// Autenticacion de Usuarios
function estaAutenticado()
{
  session_start();
  if (!$_SESSION['login']) {
    header('Location: /bienesraices/index.php');
  }
}

// Enseña por pantalla
function debuguear($variable)
{
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
  exit();
}

// Escapa / Sanitizar el HTML
function s($html): string
{
  $s = htmlspecialchars($html);
  return $s;
}
