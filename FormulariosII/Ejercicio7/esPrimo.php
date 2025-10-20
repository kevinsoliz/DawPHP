<?php

function esPrimo($numero){
    for($i = 2; $i < $numero ; $i++){
        if($numero % $i == 0)
            echo "El número $i no es primo.";
    }
    echo "El número $numero es primo.";
}

