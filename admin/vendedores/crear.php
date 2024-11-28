<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //creamos una nueva instancia con el arreglo que creamos desde el html vendedor (este contiene todos los datos)
    $vendedor = new Vendedor($_POST['vendedor']);
    // validar que no haya campos vacios
    $errores = $vendedor->validar();
    // si no hay errores añadir un nuevo vendedor
    if(empty($errores)){
        $vendedor->guardar();
    }
}
incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Registrar vendedor(a)</h1>
    <a href="../index.php" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>

    <?php endforeach; ?>



    <form class="formulario" action="/bienesraices/admin/vendedores/crear.php" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_vendedores.php'; ?>
        <input type="submit" value="Guardar cambios" class="boton boton-verde">
    </form>
</main>

<?php

incluirTemplate('footer');
?>