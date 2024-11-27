<?php
require 'includes/app.php';
incluirTemplate('header');

?>

<main class="contenedor seccion">
  <h1>Conoce sobre nosotros</h1>

  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.jpg" type="image/webp">
        <source srcset="build/img/nosotros.webp" type="image/jpeg">
        <img src="build/img/nosotros.jpg" alt="sobre nosotros" loading="lazy">
      </picture>
    </div>
    <div class="texto-nosotros">
      <blockquote>25 Años de experiencia</blockquote>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quaerat cum nihil, a non numquam facilis iste
        maiores? Dolorum placeat quo debitis eos, ab eius explicabo impedit at tempore doloribus!
      </p>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, eligendi. Rem necessitatibus amet expedita
        quam, quo quasi fuga. Porro reiciendis beatae vitae nihil consectetur voluptates enim odit error iusto
        exercitationem?
      </p>
    </div>

  </div>

</main>
<section class="contenedor seccion">
  <h1>Mas sobre nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
      <h1>Seguridad</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit
        accusantium, quos perferendis blanditiis animi consequuntur eum
        quaerat voluptatum repellendus quisquam laborum, molestiae ab
        corrupti, aspernatur delectus placeat rerum explicabo dolorem.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
      <h1>Precio</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit
        accusantium, quos perferendis blanditiis animi consequuntur eum
        quaerat voluptatum repellendus quisquam laborum, molestiae ab
        corrupti, aspernatur delectus placeat rerum explicabo dolorem.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
      <h1>tiempo</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit
        accusantium, quos perferendis blanditiis animi consequuntur eum
        quaerat voluptatum repellendus quisquam laborum, molestiae ab
        corrupti, aspernatur delectus placeat rerum explicabo dolorem.
      </p>
    </div>
  </div>
</section>

<?php

incluirTemplate('footer');
?>