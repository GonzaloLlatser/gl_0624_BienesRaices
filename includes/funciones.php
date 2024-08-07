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

// Validar tipo de contenido
function validarTipoContenido($tipo)
{
  $tipos = ['vendedor', 'propiedad'];
  return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo)
{
  $mensaje = "";
  switch ($codigo) {
    case '1':
      $mensaje = "Creado Correctamente";
      break;
    case '2':
      $mensaje = "Actualiazado Correctamente";
      break;
    case '3':
      $mensaje = "Eliminado Correctamente";
      break;
    default:
      $mensaje = "False";
      break;
  }
  return $mensaje;
}
