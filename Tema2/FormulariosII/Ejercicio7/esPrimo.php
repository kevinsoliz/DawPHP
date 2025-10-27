<?php

function esPrimo($numero){
    $divisores = 0;
    for($i = 2; $i < $numero ; $i++){
        if($numero % $i == 0)
           $divisores++;
    }
    return $divisores === 0;
}

