<?php
use App\Propiedad;


if($_SERVER['SCRIPT_NAME']==='/anuncios.php'){
    $propiedades = Propiedad::all();
}else{
    $propiedades = Propiedad::get(3);
}
?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){
        
     ?>
        <div class="anuncio">

            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen;?>" alt="Anuncio" />

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio"><?php echo $propiedad->precio; ?></p>

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
                <a class="boton-amarillo-block" href="anuncio.php?id=<?php echo $propiedad->id; ?>">Ver propiedad</a>
            </div> <!--contenido anuncio-->
        </div> <!-- anuncio-->
    <?php } ?>
</div> <!-- contenedor anuncio-->
