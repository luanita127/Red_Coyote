<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
    /*Desarrolador: Luana Alvarez
    Propósito: Este código recibe la información a través del java, aquí se verifica que la información recibida sea correcta y/o existente, y se inserta a la base de datos, 
    regresando una respuesta a JS mediante echo json_encode indicando si el resgistro se hizo con éxito o no. Existe un if para la ruta de la foto recibida, su función a
    grandes rasgos es cambiar la ruta temporal por una nueva, y meter el archivo a su carpeta correspondiente. Por otro lado, existe un if, para distinguir qué punto de la 
    prepa fue seleccionado, de tal forma que esa información se pueda ingresar a la base de datos de acuerdo a su ID y no a la cadena de texto, facilitando así el procesamiento
    y el almacenamiento de la información. En síntesis, almacena en la base de datos toda la información recibida en el forms de publicarProducto.php*/ 

    require "config.php";
    $conexion = connect();
    if(!$conexion)
    {
        echo "No se pudo conectar con la base";
    }else
    {
        $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] != "")? $_POST["nombre"] : false;
        $arch = (isset($_POST["arch"]) && $_POST["arch"] != "")? $_POST["arch"] : false;
        $descripcion = (isset($_POST["descripcion"]) && $_POST["descripcion"] != "")? $_POST["descripcion"] : false;
        $costo = (isset($_POST["costo"]) && $_POST["costo"] != "")? $_POST["costo"] : false;
        $fecha = (isset($_POST["fecha"]) && $_POST["fecha"] != "")? $_POST["fecha"] : false;
        $lugar = (isset($_POST["lugar"]) && $_POST["lugar"] != "")? $_POST["lugar"] : false;
        $hora = (isset($_POST["hora"]) && $_POST["hora"] != "")? $_POST["hora"] : false;

        if($_FILES["arch"])//Cambia ruta temporal por una nueva y guarda el archivo en la carpeta (../../Statics/img)
        {
                $arch = $_FILES["arch"];
                $name = $arch["name"];
                $ruta_temp = $arch["tmp_name"];
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                if(!file_exists('../../Statics/img'))
                {
                    mkdir('../../Statics/img');
                }
                $nuevaRuta= "../../Statics/img/$name";
                rename($ruta_temp,$nuevaRuta);
        }

        if($lugar==true)//Verifica cuál fue el lugar seleccionado y se le asigna su respectivo valor en la base de datos
        {
            if($lugar=="Entrada")
                $lugar = 1;
            else if ($lugar=="Patio de Sextos")
                    $lugar = 2;
            else if ($lugar=="Patio de Cuartos")
                    $lugar = 3;
            else if ($lugar=="Patio de Quintos")
                    $lugar = 4;
            else if ($lugar=="Pulpo")
                    $lugar = 5;
            else if ($lugar=="Mesas")
                    $lugar = 6;
            else if ($lugar=="Canchas")
                    $lugar = 7;
            else if ($lugar=="Pimponeras")
                    $lugar = 8;
            else if ($lugar=="Los H")
                    $lugar = 9;
            else if ($lugar=="Biblioteca")
                    $lugar = 10;
            else if ($lugar=="Vestidores")
                    $lugar = 11;
        }
        
        if($nombre && $nuevaRuta && $descripcion && $costo && $fecha && $lugar && $hora)//Mete la informacion a la base de datos
        {
            $usuario = $_SESSION["ID_Usuario"]; //CAMBIAR USUARIO CON SESIONES
            $celular = $_SESSION["Celular"];
            $ig = $_SESSION["Instagram"];
            $sql = "INSERT INTO producto ( ID_Usuario, ID_PuntosPrepa, NombreProducto, Foto, Descripcion, Costo, FechaVenta, Horario, CelularUsuario, InstagramUsuario)
            VALUES ($usuario, $lugar,'$nombre', '$nuevaRuta', '$descripcion', $costo, '$fecha', '$hora', $celular, '$ig')";
            $res = mysqli_query($conexion, $sql);
            //$id = mysqli_insert_id($conexion);
            if(!$res)
                $respuesta = array("ok"=>false, "mensaje" => "No se pudo publicar tu producto. Intentálo de nuevo más tarde.");
            else
                $respuesta = array("ok"=>true, "mensaje" => "Producto publicado. Ahora lo puedes ver en la opción tus productos.");
                
            echo json_encode($respuesta);
        }

        else 
        {
            if(!$nombre)
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó el Nombre del producto.");
            else if ( !$arch){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó la foto del producto.");
            }else if ( !$descripcion){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó la descripción del producto.");
            }else if ( !$costo){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó el costo del producto.");
            }else if(!$fecha){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó la fecha de venta del producto.");
            }else if(!$lugar){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó el lugar de entrega del producto.");
            }else if(!$hora){
                $respuesta = array("ok"=>false, "mensaje" => "No se especificó el horario disponible para la entrega.");
            }
            echo json_encode($respuesta);
        }

}

    
?>