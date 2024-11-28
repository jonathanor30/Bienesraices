<?php

require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

//Validar que sea un id valido

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT); //validar que sea un id valido con filter var
if(!$id){
  header('Location: /bienesraices/index.php');
  
}
//obetner el arreglo del vendedor
$vendedor = Vendedor::find($id);

$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // asignar los valores
  $args = $_POST['vendedor'];

  //sincronizar objeto en memoria con lo que el usuario escribio
  $vendedor->sincronizar($args);
  //validacion
  $errores=$vendedor->validar();
  if(empty($errores)){
    $vendedor->guardar();
  }

}
incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Actualizar vendedor(a)</h1>
  <a href="../index.php" class="boton boton-verde">Volver</a>
  <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>

  <?php endforeach; ?>



  <form class="formulario"  method="POST" enctype="multipart/form-data">
    <?php include '../../includes/templates/formulario_vendedores.php'; ?>
    <input type="submit" value="Crear Vendedor" class="boton boton-verde">
  </form>
</main>

<?php

incluirTemplate('footer');
?>