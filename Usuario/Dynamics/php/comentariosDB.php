<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }

    /*Desarrollador: Luana Álvarez
    Propósito: En este archivo se recibe la información del input en comunidad.php gracias al archivo comunidad.js, información (comentario) que se
    guarda en base de datos junto con el nombre del usuario y su foto de perfil gracias a las sesiones*/
    require "config.php";
    $conexion = connect();
    if(!$conexion)
    {
        echo "No se pudo conectar con la base";
    }else
    {
        $id_club = $_COOKIE["club"];
        $usuario = $_SESSION["ID_Usuario"];
        $nombreUsu = $_SESSION["Nombre"];
        $foto = $_SESSION["Foto_Perfil"];
        $comentario = (isset($_POST["comentario"]) && $_POST["comentario"] != "")? $_POST["comentario"] : false;
        $sql = "INSERT INTO Comentario (ID_Club, ID_Usuario, NombreUsuario, Foto_Perfil, Comentario)
            VALUES ($id_club, $usuario, '$nombreUsu', '$foto', '$comentario')";
            $res = mysqli_query($conexion, $sql);
            if(!$res)
                $respuesta = array("ok"=>false, "mensaje" => "No se pudo publicar tu comentario, inténtalo de nuevo más tarde :(");
            else
                $respuesta = array("ok"=>true, "mensaje" => "Se ha publicado tu comentario, ahora todos los miembros del club lo pueden ver :)");
                
            echo json_encode($respuesta);
    }
    
    //echo json_encode($comentario);
?>