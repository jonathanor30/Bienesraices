<?php
//incluye el header
require 'includes/app.php';
incluirTemplate('header');
$db = conectarDB();

//autenticar usuario

$errores= [];


if($_SERVER['REQUEST_METHOD'] ==='POST'){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) ;
    // var_dump($email);
    $password = mysqli_real_escape_string($db,$_POST['password']);


    if(!$email){
        $errores[]= "El email es obligatorio";
    }

    if(!$password){
        $errores[]= "El password es obligatorio";
    }

    if(empty($errores)){
        //revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db,$query);
        // var_dump($resultado);

        if($resultado->num_rows){
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            // var_dump($usuario);
            //verificar si el password es correcto o no 

            $auth = password_verify($password,$usuario['password']);
            if($auth){
                session_start();

                //llenar el arreglo se la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                // echo "<pre>";
                // var_dump($_SESSION);
                // echo "</pre>";
                header('Location: /bienesraices/admin/index.php');
                
            }else{
                $errores[] = "El usuario no esta autenticado";
                
            }
            

        }else{
            $errores[]="el usuario no existe";
        }
    }
    
}





?>

<main class="contenedor seccion seccion contenido-centrado">
    <h1>Iniciar sesion</h1>

    <?php foreach($errores as $error): ?>   
        <div class="alerta error">
        <?php echo $error;?>
        </div>
    <?php endforeach;?>

    <form method="POST" class="formulario ">

        <fieldset>
            <legend> Email y Password</legend>
            <label for="email">Email</label>
            <input type="email" placeholder="Ingresa tu email" id="email" name="email" require>
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Ingresa tu contraseña" name="password" id="password" require>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php

incluirTemplate('footer');
?>