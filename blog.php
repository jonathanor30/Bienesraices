<?php 
require 'includes/app.php';
 incluirTemplate('header'); 
 
?>

    <main class="contenedor seccion conenido-centrado">
      <h1>Nuestro blog</h1>

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
            <p>Escrito el : <span>20-10-2021</span> por: <span>Admin</span></p>
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
            <p>Escrito el : <span>20-10-2021</span> por: <span>Admin</span></p>
          </a>
          <p>
            Maximisa el espacio en tu hogar con esta guia, aprende a cambinar colores y muebles para darle vida a tu
            espacio
          </p>
        </div>

      </article>
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
            <p>Escrito el : <span>20-10-2021</span> por: <span>Admin</span></p>
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
            <p>Escrito el : <span>20-10-2021</span> por: <span>Admin</span></p>
          </a>
          <p>
            Maximisa el espacio en tu hogar con esta guia, aprende a cambinar colores y muebles para darle vida a tu
            espacio
          </p>
        </div>

      </article>
    </main>

    <?php 

incluirTemplate('footer');
?>