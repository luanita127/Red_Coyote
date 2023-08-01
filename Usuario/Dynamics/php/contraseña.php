<?php
    /*Desarrollador: Eduardo Garduño 
    Proposito: Este archivo creo las funciones de hashear contraseña, verificar contraseña, generar sal y pimientra, esto para ocuparlas
    en los archivos de registroBD.php para que la contraseña nadie pueda saberla ni decifrarla de manera facil, aumentando asi la seguridad
    de nuestros usuarios*/

    function hashearContra ($contra){
        $contraseñaHasheada = hash("SHA256", $contra);
        return $contraseñaHasheada;
    }
    function verificarContra ($contra, $correcta, $sal){
        $coincide = false;
        $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        for($i=0; $i<count($caracteres); $i++){
            for($j=0; $j<count($caracteres); $j++){
                $pimienta = $caracteres[$i].$caracteres[$j];
                $contraseña = $contra.$pimienta.$sal;
                if(hashearContra($contraseña) == $correcta){
                    $coincide = true;
                    break;
                }
            }
        }
        return $coincide;
    }
    function generarSal(){
        $sal = uniqid();
        return $sal;
    }
    function generarPimienta(){
        $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        $partesPimienta = array_rand($caracteres, 2);
        $p1 = $caracteres[$partesPimienta[0]];
        $p2 = $caracteres[$partesPimienta[1]];
        $pimienta = $p1.$p2;
        return $pimienta;
    }
?>