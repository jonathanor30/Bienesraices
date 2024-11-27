<?php

namespace App;

class Propiedad extends ActiveRecord
{
  protected static $tabla = "propiedades"; // donde vamos a consultar en nuestros metodos 
  protected static $columnasDB = [
    'id',
    'titulo',
    'precio',
    'imagen',
    'descripcion',
    'habitaciones',
    'wc',
    'estacionamiento',
    'creado',
    'vendedores_id'
  ]; // columnas de la base de datos


  //atributos de la clase 
  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedores_id;



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
    $this->vendedores_id = $args['vendedores_id'] ?? '';
  }

  public function validar()
  {
      if (!$this->titulo) {
          self::$errores[] = "debes añadir un titulo";
      }

      if (!$this->precio) {
          self::$errores[] = "el precio es obligatorio";
      }

      if (strlen($this->descripcion) < 50) {
          self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
      }
      if (!$this->habitaciones) {
          self::$errores[] = "el numero de habitaciones es obligatorio";
      }

      if (!$this->wc) {
          self::$errores[] = "el numero de baños es obligatorio";
      }

      if (!$this->estacionamiento) {
          self::$errores[] = "el numero de lugares de estacionamiento  es obligatorio";
      }

      if (!$this->vendedores_id) {
          self::$errores[] = "elige un vendedor";
      }

      if (!$this->imagen) {
          self::$errores[] = "La imagen es obligatoria";
      }


      return self::$errores;
  }
}
