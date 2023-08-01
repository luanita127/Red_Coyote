<?php
    /*Desarrollador: Eduardo Garduño 
    Proposito: Este archivo cierra nuestra sesion y nos redirige a inicio de sesion*/
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../../index.php');
?>