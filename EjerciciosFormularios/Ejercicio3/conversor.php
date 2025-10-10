<?php

function conversorSaM($segundos){

    $minutos = (int)($segundos / 60); //Hacemos un casting para trabajar con enteros y dividimos para obtener los minutos.
    $segundosRestantes = $segundos % 60; //Con el operador módulo obtenemos el resto que serian los segundos exactos.
    echo "$segundos segundos son $minutos minutos y $segundosRestantes segundos";
}