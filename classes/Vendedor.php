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

  // Metodos de la Clase
  public function validar()
  {
    // - Condicional Validacion de los Datos
    if (!$this->nombre) {
      self::$errores[] = "Debes añadir un nombre";
    }

    if (!$this->apellido) {
      self::$errores[] = "El apellido es Obligatorio";
    }

    if (!$this->telefono) {
      self::$errores[] = "Debes añadir el numero de teléfono";
    }

    // Verifica si es un numero [0-9], tiene 10 digitos {10}
    if (!preg_match('/[0-9]{10}/', $this->telefono)) {
      self::$errores[] = "El número de teléfono no es válido";
    }

    return self::$errores;
  }
}
