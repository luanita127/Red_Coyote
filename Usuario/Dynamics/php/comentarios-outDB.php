<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }

    /*Desarrollador: Luana Álvarez
    Propósito: Este php extrae la cookie creada por comunidad.js, proporcionando el id del club en el que se está para de tal forma pedir a la base
    de datos todos los comentarios del club con ese id, comentarios que se almacenan en un arreglo y se envían como objeto a comunidad.js donde
    se desplegaran con ayuda de css*/

    require "config.php";
    $conexion = connect();
    if(!$conexion)
    {
        echo "No se pudo conectar con la base";
    }else
    {
        $id_club = $_COOKIE["club"];
        $peticion1 = "SELECT * FROM Comentario WHERE ID_CLUB=$id_club";
        $res_com = mysqli_query($conexion, $peticion1);
        $arregloid=[];
        while($row=mysqli_fetch_array($res_com))
        {
            $arregloid[]=$row;
        }
        echo json_encode ($arregloid);
        //echo "<br><br>";
        //var_dump($arregloid);
    }
?>