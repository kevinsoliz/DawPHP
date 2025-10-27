<?php
$fichero = "datos.txt";
$ficheroCopia = "copia_datos.txt";

@ $contenido = file_get_contents($fichero) or die ("No existe tal fichero.");
echo $contenido . "<br>";

file_put_contents($ficheroCopia, $contenido);
$contenidoCopia = file_get_contents($ficheroCopia);
echo $contenidoCopia;
