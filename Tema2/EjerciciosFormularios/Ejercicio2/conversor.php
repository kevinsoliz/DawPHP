<?php

    function conversorCm($pies, $pulgadas){
     //Primero lo convertimos de pies a pulgadas muliplicando por 12 y la suma de todas las
     //pulgadas por 2.54 
         return ($pies * 12 + $pulgadas) * 2.54;
    }