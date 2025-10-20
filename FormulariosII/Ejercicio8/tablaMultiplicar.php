<?php

function tablaMultiplicar($altura, $anchura){
    echo "X  ";
    $espacio = "  ";

    for($i = 1; $i <= $anchura ; $i++){
        if($i > 9)
            $espacio = " ";
        echo $i . $espacio; ;
    }
    echo "\n";

    $espacio = "  ";
    for($i = 1; $i <= $altura; $i++){
        for($j = 1; $j <= $anchura; $j++){
            if($i * $j > 9)
                $espacio = " ";

            if($i * $j == $i)
                echo $i . $espacio;

            echo $i * $j . $espacio;
        }
        echo "\n";
        $espacio = "  ";
    }
}

tablaMultiplicar(5, 11);