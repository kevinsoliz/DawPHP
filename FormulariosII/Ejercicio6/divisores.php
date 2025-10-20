<?php

function divisores($numero){
    $mensaje = "Los divisores de $numero son ";
    for ($i=1; $i <= $numero ; $i++) {
        if($numero % $i === 0)
            $mensaje .= $i . " ";
    }
    echo $mensaje;
}

divisores(200);