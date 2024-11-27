<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

require '../../includes/app.php';
estaAutenticado();



$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('location: /bienesraices/admin/index.php');
}


//obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

$vendedores = Vendedor::all();

//arreglo con mensaje de errores 

$errores = Propiedad::getErrores();


//ejecutar el codigo despues de que el usario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  //asignar los atributos

  $args = $_POST['propiedad']; // esto es posible gracias a que se hizo un arreglo en html de propiedad
  //esto evitar asignar cada una de las propiedades a cada post

  $propiedad->sincronizar($args);


  $errores = $propiedad->validar();

  //generar un nombre unico
  $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

  //validacion
  

    //revssar que   el arreglo de errores este vacio
  if (empty($errores)) {

    //alamencar la imagen


    if ($_FILES['propiedad']['tmp_name']['imagen']) {
      $manager = new Image(Driver::class);
      $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
      $propiedad->setImagen($nombreImagen);
  
       
      $image->save(CARPETA_IMAGENES."/".$nombreImagen);
  
    }
   
    $propiedad->guardar();
    
  }


  
  
}



incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Actualizar</h1>
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>

  <?php endforeach; ?>



  <form class="formulario" method="POST" enctype="multipart/form-data">

    <?php include '../../includes/templates/formulario_propiedades.php'; ?>
    <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
  </form>
</main>

<?php

incluirTemplate('footer');
?>