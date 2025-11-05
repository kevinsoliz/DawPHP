<?php

function agregarItem($inventario, $nombre, $cantidad, $rareza){
    static $contador = 0; //Defino la variable contador como static para que su valor permanezca después de cada llamadad a la función.
    $id = $contador++;

    $inventario[$id]["nombre"] = $nombre;
    $inventario[$id]["cantidad"] = $cantidad;
    $inventario[$id]["rareza"] = $rareza;

    return $inventario;

}

function obtenerRarezaValor($rareza){
    $valor = 0;

    if($rareza === "común")
        $valor = 1;

    else if ($rareza === "raro")
        $valor = 2;

    else
        $valor = 3;
    

    return $valor;
}   