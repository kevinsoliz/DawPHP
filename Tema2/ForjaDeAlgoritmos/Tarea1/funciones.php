<?php
function esNumSuerte($clave){
    $numeros_de_la_suerte = [3, 43, 11, 98, 25];

    return in_array($clave, $numeros_de_la_suerte);
}

function validarCampos($nombre, $clave){

    return !(empty($nombre) || empty($clave));

}