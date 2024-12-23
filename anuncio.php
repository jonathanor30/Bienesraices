<?php
require 'includes/app.php';
use App\Propiedad;




$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /bienesraices/index.php');
}

$propiedad = Propiedad::find($id);

incluirTemplate('header');
?>

<main class="contenedor seccion texto-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>
    <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la prioriedad" loading="lazy">
    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo $propiedad->precio; ?></p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Incono wc">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Incono estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Incono habitaciones">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
        <p>
            <?php echo $propiedad->descripcion; ?>
        </p>

    </div>

</main>



incluirTemplate('footer');
?>