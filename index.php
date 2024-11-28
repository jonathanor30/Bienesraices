<?php

require 'includes/app.php';
incluirTemplate('header', $inicio = true);

?>

<main class="contenedor seccion">
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
</main>
<section class="seccion contenedor">
  <h2>Casas y depa en venta</h2>
  <?php 
  include 'includes/templates/anuncios.php';
  ?>
  <div class="alinear-derecha">
    <a class="boton-verde" href="anuncios.php">Ver todas</a>

  </div>
</section>
<section class="imagen-contacto">
  <h2>Encuentra la cassa de tus sueños</h2>
  <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo en brevedad</p>
  <a class="boton-amarillo" href="contacto.html">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro blog</h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="img/webp">
          <source srcset="build/img/blog1.jpg" type="img/jpeg">
          <img src="build/img/blog1.jpg" alt="texto entarda blog" loading="lazy">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="informacion-meta">Escrito el : <span>20-10-2021</span> por: <span>Admin</span></p>
        </a>
        <p>
          consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
        </p>
      </div>

    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="img/webp">
          <source srcset="build/img/blog2.jpg" type="img/jpeg">
          <img src="build/img/blog2.jpg" alt="texto entarda blog" loading="lazy">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Guia para decoracion de tu hogar</h4>
          <p class="informacion-meta">Escrito el : <span>20-10-2021</span> por: <span>Admin</span></p>
        </a>
        <p>
          Maximisa el espacio en tu hogar con esta guia, aprende a cambinar colores y muebles para darle vida a tu
          espacio
        </p>
      </div>

    </article>
  </section>
  <section class="testimoniales">
    <h3>Textimoniales</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comporto de una excelente forma, muy buena atencion y la casa que me ofrtecieron cumple con
        todas mis expectativas
      </blockquote>
      <p>- Jonathan Ortiz</p>
    </div>
  </section>
</div>

<?php

incluirTemplate('footer');
?>