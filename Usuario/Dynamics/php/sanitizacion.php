<?php
    function sanitizarCadenaSQL($cadena){
        $cadenaSanitizada = filter_var($cadena,FILTER_SANITIZE_STRING);
        return $cadenaSanitizada;
    }

    function sanitizarNumSQL($num){
        $numSanitizado = filter_var($num,FILTER_SANITIZE_NUMBER_INT);
        return $numSanitizado;
    }

    function sanitizarEmailSQL($email){
        $emailSanitizado = filter_var($email,FILTER_SANITIZE_EMAIL);
        return $emailSanitizado;
    }

    function sanitizarCadenaHTML($cadena){
        $cadenaSanitizada = htmlspecialchars($cadena);
        return ($cadenaSanitizada);
    }
?>