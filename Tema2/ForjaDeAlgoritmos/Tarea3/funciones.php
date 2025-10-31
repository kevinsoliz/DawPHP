<?php


function agregarItem($inventario, $nombre, $cantidad, $rareza){
    static $contador = 0;
    $indice = $contador++;
    $inventario[$indice]["nombre"] = $nombre;
    $inventario[$indice]["cantidad"] = $cantidad;
    $inventario[$indice]["rareza"] = $rareza;

    return $inventario;

}