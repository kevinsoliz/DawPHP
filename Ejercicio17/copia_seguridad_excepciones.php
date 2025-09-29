<?php
$fichero = "datos.txt";
$ficheroCopia = "copia_datos.txt";

try{
    if (!file_exists("datos.txt")){
        throw new Exception("El fichero no existe.");
    }
    else {
        $contenido = file_get_contents($fichero);
        echo $contenido . "<br>";

        file_put_contents($ficheroCopia, $contenido);
        $contenidoCopia = file_get_contents($ficheroCopia);
        echo $contenidoCopia; 
    }
} catch (Exception $e){
    echo 'Se ha producido un error: ' . $e -> getMessage();
}

