<?php 
require 'includes/app.php';
 incluirTemplate('header'); 
 ?>

 <main class="seccion contenedor">
  <h2>Casas y depas en venta</h2>
  <?php 
  $limite=9;
  include 'includes/templates/anuncios.php';
  ?>
 </main>
 
<?php 
incluirTemplate('footer');
?>



