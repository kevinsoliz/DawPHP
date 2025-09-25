<?php
define('PI', 3.1416);
    $radio = 3.5;
    $area = PI * $radio * $radio;
    
    $textoResultado = "El área calculada del círculo es " . number_format($area, 2) . "<br>";
    echo $textoResultado;

    $textoResultadoMayus = strtoupper($textoResultado);
    echo $textoResultadoMayus;

    $textoResultadoModificado = str_replace("calculada", "obtenida", $textoResultado);
    echo $textoResultadoModificado;

    echo "Longitud de la cadena: " . strlen($textoResultadoModificado) . "<br>";

    $posicion =  strpos($textoResultadoModificado, "círculo");
    echo "Posición de la palabra \"círculo\": " . $posicion . "<br>";

    $numeros = "1,2,3,4,5";
    $arrayNumeros = explode(",", $numeros);
    $numeros2 = implode("+", $arrayNumeros);
    echo $numeros2 . "<br>";
    $suma = 0;
    foreach($arrayNumeros as $num){
        
        $suma += $num;
    }
    echo $numeros2 . " = $suma <br>";