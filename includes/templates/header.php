<?php

if(!isset($_SESSION)){
  session_start();
}
$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes raices</title>
  <link rel="stylesheet" href="/bienesraices/build/css/app.css?v=1.0" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

</head>

<body>
  <header class="header <?php echo $inicio ? 'inicio':''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/bienesraices/index.php">
          <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de bienes raices" />
        </a>
        <div class="mobile-menu">
          <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive">
        </div>
        <div class="derecha">
          <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="dark mode">
          <nav class="navegacion">
            <a href="/bienesraices/nosotros.php">Nosotros</a>
            <a href="/bienesraices/anuncios.php">Anuncios</a>
            <a href="/bienesraices/blog.php">Blog</a>
            <a href="/bienesraices/contacto.php">Contacto</a>
            <?php if($auth): ?>
              <a href="cerrar-sesion.php">Cerrar sesion</a>
              <?php endif; ?>
          </nav>
        </div>
        
      </div>
            <?php if($inicio){?>
      <h1>Venta de casas y departamentos explusivos de lujo</h1>
      <?php }?>
    </div>
    <!--cierre de la barra-->
  </header>