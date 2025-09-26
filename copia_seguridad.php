<?php
$fichero = "datos.txt";
$ficheroCopia = "copia_datos.txt";

$contenido = file_get_contents($fichero);
echo $contenido . "<br>";

file_put_contents($ficheroCopia, $contenido);
$contenidoCopia = file_get_contents($ficheroCopia);
echo $contenidoCopia;
