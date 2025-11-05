<?php

include_once "funciones.php";
if($_POST){
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $rareza = $_POST['rareza'];
    $inventario = [];
   
  


    $inventario = agregarItem($inventario, $nombre, $cantidad, $rareza);
    

    foreach($inventario as $clave => $valores){
        echo $clave . ": ";
        foreach($valores as $clave => $valor){
            echo "$clave: $valor ";
        }
        echo "<br>";
    }
    


}