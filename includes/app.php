<?php

// Importacion de archivos
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conecta a la BBDD
$db = conectarBD();

use App\ActiveRecord;

ActiveRecord::setDB($db);
