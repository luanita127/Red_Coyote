<?php
require "config.php";
$conexion = connect();
if(!$conexion)
{
    echo "No se pudo conectar con la base";
}else
{
    $sql = "SELECT MAX(ID_Club) FROM Club";
    $res = mysqli_query($conexion, $sql);
    $num = mysqli_fetch_row($res);
    // if(!$res)
    //     $respuesta = "no";
    // else
    //     $respuesta = "sí";
    echo $num[0];
    // var_dump($num);
    // echo ($num[1]);
        
  
}
?>