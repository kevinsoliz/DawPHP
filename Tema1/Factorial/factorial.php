<?php

function factorial($n){
    $resultado = 0;
    if($n === 0 ){
        $resultado = 1;
    }
    else {
        $resultado = $n * factorial($n - 1); 
    }
    return $resultado;
}

echo "respuesta: " . factorial(6) . "<br>";

function factorial2($n){

    for($i = $n; $i > 1; $i--){
        $n *= $i - 1;
    }
    return $n;
}

echo "respuesta 2: " . factorial2(6);