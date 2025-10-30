<?php

function esNumSuerte($clave) {
    $siEs                 = false;
    $numeros_de_la_suerte = [3, 43, 11, 98, 25];
    foreach ($numeros_de_la_suerte as $numero) {
        if ($clave
            == $numero) { //Bloque condicional para comprobar si clave está dentro del array
            $siEs = true;
        }
    }

    return $siEs;
}

function validarCampos($nombre, $clave) {
    return !(empty($nombre) || empty($clave));
}