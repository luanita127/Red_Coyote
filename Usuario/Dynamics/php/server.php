<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrollador: Eduardo Garduño 
    Proposito: En este archivo lo que ocurre es que buscara los datos del club el cual antes fue buscado para que se pueda desplegar la informacion de este*/
    require "config.php";
    require "./sanitizacion.php";
    $conexion = connect ();
    if(!$conexion){
        echo "No se puedo conectar la base";
    }else{
        $club = (isset($_POST["club"]) && $_POST["club"] != "")? $_POST["club"] : false;
        $sql = "SELECT * FROM club WHERE Nombre = '$club'";
        $res = mysqli_query($conexion, $sql);
        $respuesta = [];
        while($row = mysqli_fetch_assoc($res)){
            $respuesta[] = $row;
        }
        echo json_encode($respuesta);
    }
?>