<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrollador: Eduardo Garduño 
    Proposito: Este archivo sirve para editar los datos del usuario, permitimos que cambien su foto de perfil, su nombre, celular e instagram
    pero antes de realizar los cambios se verifica que la informacion que mande el usuario no contenga datos que puedan afectar nuestra base 
    de datos, a traves de funciones de sanitizacion y regex, si la informacion es aceptada se hacen peticiones a la base de datos, en la cual 
    actualizaremos los registros*/

    require "config.php";
    require "./sanitizacion.php";
    $conexion = connect ();
    if(!$conexion){
        echo "No se puedo conectar la base";
    }else{
        $nomImg = (isset($_POST["nomImg"]) && $_POST["nomImg"] != "")? $_POST["nomImg"] : false;
        $nombre = sanitizarCadenaSQL((isset($_POST["nombre"]) && $_POST["nombre"] != "")? $_POST["nombre"] : false);
        $celular = sanitizarNumSQL((isset($_POST["celular"]) && $_POST["celular"] != "")? $_POST["celular"] : false);
        $instagram = sanitizarEmailSQL((isset($_POST["instagram"]) && $_POST["instagram"] != "")? $_POST["instagram"] : false);
        $regex1 = "[;]";
        $regex2 = "[\s]";
        $regex3 = "/^@(\w|\.){1,}/";

        if(strlen($nombre) >= 20 || preg_match($regex1, $nombre) == 1 || strlen($celular) != 10 || strlen($instagram) >= 20 || preg_match($regex1, $instagram) == 1 || preg_match($regex3, $instagram) == 0){
            $respuesta = array("mensaje" => "¿Acaso querias hackearnos?");
            echo json_encode($respuesta);
        }else{
            if(isset($_FILES["img"]) && ["name"] != ""){
                $name = $_FILES["img"]["name"];
                $img = $_FILES["img"]["tmp_name"];
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $nombreDeArchivo = pathinfo($name, PATHINFO_FILENAME);
                $nuevaRuta= "../../Statics/media/fotosPerfil/$nomImg";
                rename($img, $nuevaRuta);
                $sql = "UPDATE usuario SET Foto_Perfil = '$nuevaRuta' WHERE Cuenta = ".$_SESSION["usuario"];
                $res = mysqli_query($conexion, $sql);
                $_SESSION["Foto_Perfil"] = $nuevaRuta;
            }
            if($nombre){
                $sql1 = "UPDATE usuario SET Nombre = '$nombre' WHERE Cuenta = ".$_SESSION["usuario"];
                $res1 = mysqli_query($conexion, $sql1);
                $_SESSION["Nombre"] = $nombre;
            }
            if($celular){
                $sql2 = "UPDATE usuario SET Celular = '$celular' WHERE Cuenta = ".$_SESSION["usuario"];
                $res2 = mysqli_query($conexion, $sql2);
                $_SESSION["Celular"] = $celular;
            }
            if($instagram){
                $sql3 = "UPDATE usuario SET Instagram = '$instagram' WHERE Cuenta = ".$_SESSION["usuario"];
                $res3 = mysqli_query($conexion, $sql3);
                $_SESSION["Instagram"] = $instagram;
            }
            $respuesta = array("mensaje" => "Datos actualizados");
            echo json_encode($respuesta);
        }
    }
?>