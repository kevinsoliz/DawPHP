<?php

function tablaMultiplicar($vertical, $horizontal){
    echo "X..";
    $espacio = "...";

    for($i = 1; $i <= $horizontal ; $i++){
        if($i > 9)
            $espacio = ".";
        echo $i . $espacio; ;
    }
    echo "<br>";

    $espacio = "...";
    for($i = 1; $i <= $vertical; $i++){
        for($j = 1; $j <= $horizontal; $j++){
            if($i * $j > 9)
                $espacio = ".";

            if($i * $j == $i)
                echo $i . $espacio;

            echo $i * $j . $espacio;
        }
        echo "<br>";
        $espacio = "...";
    }
}

