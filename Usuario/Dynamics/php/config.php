<?php
    /*Desarrollador: Eduardo Garduño 
    Proposito: Este archivo es la conexion con la base de datos para que pudieramos interactuar con esta con ayuda de php*/
    
    const DBHOST = "localhost";
    const DBUSER = "root";
    const DBPASS = "";
    const DBNAME = "RedCoyote";

    function connect (){
        $conexion = mysqli_connect (DBHOST, DBUSER, DBPASS, DBNAME);
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }
?>