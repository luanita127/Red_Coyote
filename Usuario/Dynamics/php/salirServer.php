<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrollador: Eduardo Garduño 
    Proposito: En este archivo se realiza una peticion a la base de datos, en la cual borraremos datos de una columna, esto porque a traves
    de una peticion fetch en js se pide salirse de un club y borramos el registro del usuario de ese club*/

    require "config.php";
    $conexion = connect ();
    if(!$conexion){
        echo "No se puedo conectar la base";
    }else{
        $ID_Club = (isset($_POST["ID_Club"]) && $_POST["ID_Club"] != "")? $_POST["ID_Club"] : false;
        $sql = "DELETE FROM miembros_club WHERE ID_Club = $ID_Club AND ID_Usuario = ".$_SESSION["ID_Usuario"];
        $res = mysqli_query($conexion, $sql);
        $respuesta = array("mensaje" => "Has abandonado al club, ".$_SESSION["Nombre"]);
        echo json_encode($respuesta);
    }
?>