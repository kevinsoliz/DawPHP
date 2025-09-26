<?php


for ($i = 0; $i < 10; $i++){
    for($j = 0; $j < 10; $j++){
        $tablaMultiplicar[$i][$j] = $i * $j;
    }
}

for ($i = 0; $i < 10; $i++){
    echo "Tabla del $i: <br>";
    for($j = 0; $j < 10; $j++){
        echo "$i x $j = " . $tablaMultiplicar[$i][$j] . "<br>";
    }
    echo "<br>";
}

