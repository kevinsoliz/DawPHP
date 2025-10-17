<?php

    function conversorDistancia($distancia){
        if($distancia < 100000){

            $metros = round($distancia / 100);
            $centimetros = $distancia % 100; 
        
             echo "$distancia cm son $metros m y $centimetros cm.";
        }
        else{
            $kilometros = round($distancia / 100000);
            $centimetros = $distancia % 100000;
            $metros = round($centimetros / 100);
            $centimetros2 = $centimetros % 100;
            

            

            echo "$distancia cm son $kilometros km, $metros m y $centimetros2 cm.";
        }

    

    }