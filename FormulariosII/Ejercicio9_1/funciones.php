<?php

function suma($array){
    $suma = 0;
    foreach ($array as $elemento){
        $suma += $elemento;
    }
    return $suma;
}

function media($array){
    $total = suma($array);
    return ($total / count($array));
}

function maximo($array){
    $maximo = 0;
    foreach ($array as $elemento){
        if($elemento > $maximo){
            $maximo = $elemento;
        }
    }
    return $maximo; 
}

function minimo($array){
    $minimo = $array[0];
    foreach ($array as $elemento){
        if($elemento < $minimo){
            $minimo = $elemento;
        }
    }
    return $minimo; 
}

function mostrarFormulario($cantidad){
    echo "<form action='procesar2.php' method='post'"
    for($i = 1; $i <= $cantidad; $i++){
        echo "    
            <label for='numero'>Numero$i</label>
            <input type='text' id='numero' name='numero[]'>
            <br>
        ";
    }
    echo'
        <label for="suma" class="label-inline">Suma</label>
        <input type="checkbox" id="suma" name="opcion[]">
        <label for="media" class="label-inline">Media</label>
        <input type="checkbox" id="media" name="opcion[]">
        <label for="maximo" class="label-inline">Máximo</label>
        <input type="checkbox" id="maximo" name="opcion[]">
        <label for="minimo" class="label-inline">Mínimo</label>
        <input type="checkbox" id="minimo" name="opcion[]">
        ';
    echo "</form>"
}

