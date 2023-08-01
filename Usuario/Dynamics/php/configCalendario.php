<?php
const DBHOST = "localhost";
const DBUSER = "root";
const DBPASS = "";
const DBNAME = "Calendario";

function connect() {
    $conexion = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("No se pudo conectar correctamente");
    mysqli_set_charset($conexion, 'utf8');
    return $conexion;
}

?>