<?php

function mejoraSalarial($salario, $edad){
    if ($salario < 1000){ //Se verfica el primer grupo está definido por salarios menores que 1000.
                        //En función de la edad se hará una cosa u otra.
        if($edad < 30) 
            $salario = 1100;

        else if($edad >= 30 && $edad < 45)
            $salario += $salario * 0.3;

        else 
            $salario += $salario * 0.15;

    }
    else if ($salario >= 1000 && $salario < 2000){ //Se verifica el segundo grupo con salarios más elevados

        if($edad >= 45)
            $salario += $salario * 0.3;

        else
            $salario += $salario * 0.1;
    }
    
    return $salario;
}