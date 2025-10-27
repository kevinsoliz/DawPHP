<?php
//$texto = "Hola 123 Mundo";
//$resultado = ereg_replace("[0-9]", "", $texto);
//echo $resultado;

/*
"/^(\d{2}):/
*/
$horaCompleta = "23:59:24";

$horaCorrecta = preg_match("/^(\d{2}):(\d{2}):(\d{2})$/", $horaCompleta, $arrayHora);


    if($horaCorrecta){
        
        $hora = $arrayHora[1];
        $minuto = $arrayHora[2];
        $segundo = $arrayHora[3];
        if($hora >= 0 && $hora < 24){
            if($minuto >= 0 && $minuto < 60){
                if($segundo >= 0 && $segundo < 60){
                    echo "Hora correctaaaa!";
                }
                else 
                    echo "Segundos incorrectos. <br>";
            }
            else 
                echo "Minutos incorrectos. <br>";
        }
        else 
            echo "Hora incorrecta! <br>";
    }
    else
        echo "Formato incorrecto.";

