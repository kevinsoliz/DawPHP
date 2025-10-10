<?php

function imc ($altura, $peso){
    //La altura se introduce en cm por lo que se hace una conversión a metros. 
    $altura /= 100;
    
    //Se hace uso de la fórmula del IMC y se retorna el resultado.
    return round($peso / $altura ** 2);
}