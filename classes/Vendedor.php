<?php

namespace App;

class Vendedor extends ActiveRecord
{
  protected static $tabla = "vendedores";
  protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

  // Atributos de la Clase
  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  // Constructor
  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
  }
}