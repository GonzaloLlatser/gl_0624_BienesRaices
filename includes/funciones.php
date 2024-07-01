<?php
// Vinculacion archivo de funciones
require 'app.php';


// Definicion de Funciones
function incluirTemplate(string $nombre, bool $inicio = false)
{
  include TEMPLATES_URL . "/{$nombre}.php";
}
