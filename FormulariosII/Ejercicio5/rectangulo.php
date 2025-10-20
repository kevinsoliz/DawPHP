<?php

function rectangulo($altura, $anchura){
    for($i = 0; $i < $altura; $i++){
        for($j = 0; $j < $anchura; $j++){
            echo "*";
        }
        echo "<br>";
    }
}

rectangulo(4, 3);