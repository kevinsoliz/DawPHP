<?php
//$texto = "Hola 123 Mundo";
//$resultado = ereg_replace("[0-9]", "", $texto);

/*
"/^(\d{2}):/
*/
$hora = "21:05:24";

$horaCorrecta = preg_match("/^(\d{2}):(\d{2}):(\d{2})$/", $hora, $arrayHora);
echo $horaCorrecta ? "La hora es correcta" : "La hora no es correcta";
