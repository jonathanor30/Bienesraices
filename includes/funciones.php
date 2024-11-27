<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');




function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/" . $nombre . ".php";
}

function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('location: /bienesraices/index.php');
    }
}

function debugear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}

//escapa / santirizar el html

function s($html){
    $s=htmlspecialchars($html);
    return $s;
}

//validar tipo de contenido

function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo,$tipos);
}