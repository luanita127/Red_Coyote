<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header('Location: ../../index.php');
    }
/*Desarrolador: Luana Alvarez
Propósito: Este código tiene como objetivo principal jalar todos los registros de la tabla producto. Lo que hace es que jala todos los registros mediante su ID_Producto,
que con un while va metiendo dentro de un arreglo. Luego, con un foreach se recorre ese arreglo creado con los id´s recibidos, de tal forma que se puede hacer una
petición a mysql pidiendo los datos que se necesitan desplegar igualando el ID_Producto al valor que tiene la localidad del arreglo, y a su vez, este mismo foreach mete
toda la información recibida a un arreglo que después se mandará por echo json_encode a ventas.js donde se desplegará toda esta información.*/ 

require "./config.php";
$conexion= connect();
if (!$conexion){
    echo "no se conceto con la base";
}
else{
    $id_producto = "SELECT ID_Producto FROM producto"; 
    $res_id = mysqli_query($conexion, $id_producto);
    $arregloid=[];
    while($row=mysqli_fetch_assoc($res_id)) //mete todos los id´s recibidos en un arreglo
    {
        $arregloid[] = $row["ID_Producto"];
    }
    $arregloinfo=[];
    foreach($arregloid as $localidad=>$valor)//recorre el arreglo de id´s y a su vez va metiendo en otro arreglo la información que llega de la petición creando así un arreglo donde cada localidad representa un registro 
    {
        $peticion = "SELECT ID_Producto, NombreProducto, Foto FROM producto WHERE ID_Producto = $valor ";
        $res_info = mysqli_query($conexion, $peticion);
        $respuesta = mysqli_fetch_assoc($res_info);
        $arregloinfo[]= array("id"=>$respuesta["ID_Producto"], "Nombre"=>$respuesta["NombreProducto"], "Foto"=>$respuesta["Foto"]); //arreglo con todos los productos que hay en la base de datos
    }
    echo json_encode($arregloinfo);
}
?>