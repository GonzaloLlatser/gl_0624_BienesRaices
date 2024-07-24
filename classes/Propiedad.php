<?php

namespace App;

class Propiedad extends ActiveRecord
{
  protected static $tabla = "propiedades";
  protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

  // Atributos de la Clase
  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedorId;

  // Constructor
  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->titulo = $args['titulo'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->habitaciones = $args['habitaciones'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->estacionamiento = $args['estacionamiento'] ?? '';
    $this->creado = date('Y/m/d');
    $this->vendedorId = $args['vendedorId'] ?? "";
  }

  
  public function validar()
  {
    // - Condicional Validacion de los Datos
    if (!$this->titulo) {
      self::$errores[] = "Debes añadir un título";
    }

    if (!$this->precio) {
      self::$errores[] = "El precio es Obligatorio";
    }

    if (strlen($this->descripcion) < 50) {
      self::$errores[] = "La Descripción es Obligatoria y debe tener al menos 50 caracteres";
    }

    if (!$this->habitaciones) {
      self::$errores[] = "El número de habitaciones es Obligatorio";
    }

    if (!$this->wc) {
      self::$errores[] = "El número de baños es Obligatorio";
    }

    if (!$this->estacionamiento) {
      self::$errores[] = "El número de sitios de estacionamiento es Obligatorio";
    }

    if (!$this->vendedorId) {
      self::$errores[] = "Selecciona un vendedor";
    }
    // Imagen - Validacion de existencia
    if (!$this->imagen) {
      self::$errores[] = "La imagen de la Propiedad es Obligatoria";
    }
    return self::$errores;
  }
}
