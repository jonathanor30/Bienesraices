<?php

namespace App;

class ActiveRecord
{

    //base de datos
    protected static $db;

    //creamos las columnas como la tenemos en la base de datos para poder mapearlas ( hacerles foreach)
    protected static $columnasDB = [];
    protected static $tabla = '';


    //Errores

    protected static $errores = [];




    // definir la conexion a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
    }



    public function guardar()
    {
        if (!is_null($this->id)) {
            //actualizar
            $this->actualizar();
        } else {
            //crear un nuevo registro
            $this->crear();
        }
    }

    public function crear()
    {

        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        //Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla  .  "( ";
        $query .= join(', ', array_keys($atributos)); //JOin crea un string a   partir de un arreglo. Toma dos parametros, primero el arreglo y luego el arreglo
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header("Location: /bienesraices/admin/index.php?resultado=1");
        }
    }

    public function actualizar()
    {

        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado) {

            // Redireccionar al usuario
            header("Location: /bienesraices/admin/index.php?resultado=2");
        }
    }

    //eliminar un registro
    public function eliminar()
    {

        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->eliminarImagen();
            // Redireccionar al usuario
            header("Location: /bienesraices/admin/index.php?resultado=3");
        }
    }

    //indentificar y uni los atributos de la db
    public function datos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarDatos()
    {
        $atributos = $this->datos();
        $sanitizado = [];


        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }
    //subida de imagen 
    public function setImagen($imagen)
    {
        //elimina la imagen previa
        if (!is_null($this->id)) {
            //comprobar si existe el archivo 
            $this->eliminarImagen();
        }

        //asignar al atributo de imagen el nombre de la imagen 
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
    // elimianr archivo  // imagen
    public function eliminarImagen()
    {

        //elimianr el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //validacion

    public static function getErrores()
    {   
        
        return static::$errores;
    }

    public function validar()
    {
       
        static::$errores = [];
        return static::$errores;
    }

    //lista todas las propiedades
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;


        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //busca propiedad por su id

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado); // devuelve la primera posocion de un arreglo
    }

    public static function consultarSQL($query)
    {
        //consultar la base de datos 
        $resultado = self::$db->query($query);
        //interar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        //liberar la memoria 
        $resultado->free();
        //retornar los resultados
        return $array;
    }

    protected static  function crearObjeto($registro)
    {
        $objeto = new static; //intanciamos nuestro objeto padre y como viene vacios ya que los declaramos asi los recorremos mas adelante
        // CON NEW STATCI INSTANCIAMOS NUESTRO OBJETO HERENADO 
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) { //esta funcion revisa si el objeto ya tiene una llave 
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }
    //sincroniza el objeto en memoria con los cambios realziados por el usuario
    //empata los id del  arreglo  con los del objeto y lo va reeescribiendo
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) { //Comprueba si la clave del arreglo coincide con una propiedad existente en el objeto
                $this->$key = $value;
            }
        }
    }
}
