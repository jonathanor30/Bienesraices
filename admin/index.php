<?php

require '../includes/app.php';
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

//implementar un metodo para obtener todas las propiedades
$vendedorades = Propiedad::all();
$vendedores = Vendedor::all();




//mueestra mensaje condicional
$resultado = $_GET['resultado'] ?? null; // la linea final dice que si no existe asigna null

// comprobancion si mandan un id para eliminar para que no marque error si no han eliminado nada ya que no existe el post antes de elimianr
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);
  var_dump($id);




  if ($id) {

    $tipo = $_POST['tipo'];
    if (validarTipoContenido($tipo)) {
      //compara lo que vamos a eliminar 
      if ($tipo === 'vendedor') {
        $vendedor = Vendedor::find($id);
        $vendedor->eliminar();
      } else if ($tipo === 'propiedad') {
        //obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);
        $propiedad->eliminar();
      }
    }
  }
}

//incluir template
//importar la conexion
$db = conectarDB();
incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Administrador de bienes raices</h1>
  <?php if (intval($resultado) === 1): ?> <!-- inval cambia a int la variable -->

    <p class="alerta exito">Anuncio creado correctamente</p>
  <?php elseif (intval($resultado) === 2): ?>

    <p class="alerta exito">Anuncio Actualizado correctamente</p>
  <?php elseif (intval($resultado) === 3): ?>

    <p class="alerta exito">Anuncio Eliminado correctamente</p>

  <?php endif; ?>
  <div class="tabs">
  <div class="tab-container">
    <div id="tab3" class="tab"> 
      <a href="#tab3">Pestaña 3</a>
      <div class="tab-content">
        <h2>Titulo 3</h2>
        <p>Lorem ipsum ...</p>
      </div>
    </div>
    <div id="tab2" class="tab">
      <a href="#tab2">Pestaña 2</a>
      <div class="tab-content">
        <h2>Titulo 2</h2>
        <p>Lorem ipsum ...</p>
      </div>
    </div> 
    <div id="tab1" class="tab">
      <a href="#tab1">Pestaña 1</a>
      <div class="tab-content">
        <h2>Titulo 1</h2>
        <p>Lorem ipsum ...</p>
      </div> 
    </div> 
  </div>
</div>

  <a href="propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
  <a href="vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>


  <h2>Propiedades</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <!-- mostrar los resultados-->
    <tbody>
      <?php foreach ($vendedorades as $vendedor): ?>
        <tr>
          <td><?php echo $vendedor->id; ?></td>
          <td><?php echo $vendedor->titulo; ?></td>
          <td><img src="../imagenes/<?php echo $vendedor->imagen; ?>" class="imagen-tabla"></td>
          <td>$ <?php echo $vendedor->precio; ?></td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <h2>Vendedores</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <!-- mostrar los resultados-->
    <tbody>
      <?php foreach ($vendedores as $vendedor): ?>
        <tr>
          <td><?php echo $vendedor->id; ?></td>
          <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
          <td><?php echo $vendedor->telefono; ?></td>
          <td>
            <form method="POST" class="w-100">
              <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
              <input type="hidden" name="tipo" value="vendedor">
              <input type="submit" class="boton-rojo-block" value="Eliminar">
            </form>

            <a href="/bienesraices/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>

<?php
incluirTemplate('footer');
?>