<?php

namespace App;

class ActiveRecord
{
  // Atributos estaticos
  // - BBDD
  protected static $db;
  protected static $columnasDB = [];
  protected static $tabla = "";

  // Errores 
  protected static $errores = [];

  // - Metodo Conectar la BBDD
  public static function setDB($database)
  {
    self::$db = $database;
  }

  // Metodos 
  public function guardar()
  {
    if (!is_null($this->id)) {
      $this->actualizar();
    } else {
      $this->crear();
    }
  }

  // - Metodo Guardar en la BBDD
  public function crear()
  {
    // Sanitizar los datos ingresados por el usuario
    $atributos = $this->sanitizarAtributos();

    // Insertar en la BBDD
    // - Genera Query SQL
    $query = "INSERT INTO " . static::$tabla . " (";
    $query .= join(',', array_keys($atributos));
    $query .= " ) VALUES(' ";
    $query .= join("','", array_values($atributos));
    $query .= " ') ";

    $resultado = self::$db->query($query);

    // - Confirmacion de Formulado enviado
    if ($resultado == true) {
      // Insertado Correctamente- Redirecciono al Usuario
      header('Location: /bienesraices/admin?resultado=1');
    } else {
      echo "No se pudo insertar los datos";
    }

    return $resultado;
  }

  public function actualizar()
  {

    // Sanitizar los datos ingresados por el usuario
    $atributos = $this->sanitizarAtributos();
    $valores = [];
    foreach ($atributos as $key => $value) {
      $valores[] = "{$key}='{$value}'";
    }

    $query = "UPDATE " . static::$tabla . " SET ";
    $query .= join(',', $valores);
    $query .= " WHERE id= '" . self::$db->escape_string($this->id) . "'";
    $query .= " LIMIT 1";

    $resultado = self::$db->query($query);

    // - Confirmacion de Formulado enviado
    if ($resultado == true) {
      // Insertado Correctamente- Redirecciono al Usuario
      header('Location: /bienesraices/admin?resultado=2');
    }
  }

  // Eliminar Propiedades
  public function eliminar()
  {
    // Eliminar registro de mi BBDD
    // - Genera Query
    $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $resultado = self::$db->query($query);
    // Condicional de existir resultado
    if ($resultado) {
      $this->borrarImagen();
      // Redirecciona a la pagina ADMIN
      header('Location: /bienesraices/admin?resultado=3');
    }
  }

  // - Identifica y une los atributos a la BBDD
  public function atributos()
  {
    $atributos = [];
    // Recorre el array de atributos
    foreach (static::$columnasDB as $columna) {
      // Evita el id
      if ($columna === 'id') continue;

      $atributos[$columna] = $this->$columna;
    }
    return $atributos;
  }

  // - Sanitizar los datos ingresados por el usuario
  public function sanitizarAtributos()
  {
    $atributos = $this->atributos();
    $sanitizado = [];
    foreach ($atributos as $key => $value) {
      $sanitizado[$key] = self::$db->escape_string($value);
    }
    return ($sanitizado);
  }

  // Subida de archivos
  public function setImagen($imagen)
  {

    // Elimina la imagen previa
    if (!is_null($this->id)) {
      $this->borrarImagen();
    }
    // Asignar al atributo imagen el nombre de la imagen
    if ($imagen) {
      $this->imagen = $imagen;
    }
  }
  // Eliminar el archivo
  public function borrarImagen()
  {
    $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

    if ($existeArchivo) {
      // Elimina imagen del archivo
      unlink(CARPETA_IMAGENES . $this->imagen);
    }
  }
  // - Validacion
  public static function getErrores()
  {
    return static::$errores;
  }

  public function validar()
  {
    static::$errores = [];
    return static::$errores;
  }

  // Lista las Propiedades
  public static function all()
  {
    $query = "SELECT * FROM " . static::$tabla;
    $resultado = self::consultarSQL($query);
    return $resultado;
  }

  // Busca un registro por su ID
  public static function find($id)
  {
    $query = "SELECT * FROM " . static::$tabla . " WHERE id={$id}";
    $resultado = self::consultarSQL($query);
    return array_shift($resultado);
  }

  public static function consultarSQL($query)
  {
    // Consultar la BBDD
    $resultado = self::$db->query($query);
    // Iterar los resultados
    $array = [];
    while ($registro = $resultado->fetch_assoc()) {
      $array[] = static::crearObjeto($registro);
    }
    // Liberar la Memoria
    $resultado->free();

    // Retornar los resultados
    return $array;
  }

  protected static function crearObjeto($registro)
  {
    $objeto = new static;
    foreach ($registro as $key => $value) {
      if (property_exists($objeto, $key)) {
        $objeto->$key = $value;
      }
    }
    return $objeto;
  }

  // Sincroniza los cambios del Objeto
  public function sincronizar($args = [])
  {
    foreach ($args as $key => $value) {
      if (property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
}
