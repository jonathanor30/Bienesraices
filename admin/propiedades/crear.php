<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

estaAutenticado();



//consultar para obtener los vendedores
$vendedores=Vendedor::all();

$propiedad = new Propiedad;

//arreglo con mensaje de errores 

$errores = Propiedad::getErrores();


//ejecutar el codigo despues de que el usario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  //crea una nueva instancia
  $propiedad = new Propiedad($_POST['propiedad']);

  //generar un nombre unico
  $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
  
  //setear la imagen 
  //realizar un resize a la imagen con intervetion
  if ($_FILES['propiedad']['tmp_name']['imagen']) {
    $manager = new Image(Driver::class);
    $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
    $propiedad->setImagen($nombreImagen);
  }

  //validar
  $errores = $propiedad->validar();


  //revssar que el arreglo de errores este vacio
  if (empty($errores)) {

    //crear una carpetas

    if (!is_dir(CARPETA_IMAGENES)) {
      mkdir(CARPETA_IMAGENES);
    }

    //guarda la imagen en el servidor
    $image->save(CARPETA_IMAGENES . $nombreImagen);


    //guarda en la base de daatos
     $propiedad->guardar();

    
  }
}



incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>

  <?php endforeach; ?>



  <form class="formulario" action="/bienesraices/admin/propiedades/crear.php" method="POST" enctype="multipart/form-data">
    <?php include '../../includes/templates/formulario_propiedades.php'; ?>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>

<?php

incluirTemplate('footer');
?>