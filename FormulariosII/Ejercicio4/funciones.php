<?php

function factorial($numero) {
    if($numero === 0)
        return 1;
    else
        return $numero * factorial($numero - 1);
}

function sumatorio($numero){
    $total = 0;
    for($i = 1; $i <= $numero; $i++){
        $total += $i;
    }
    return $total;
}

echo sumatorio(100);