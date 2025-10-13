<?php

    function esBisiesto($year){
        $esBisiesto = false;

        if ($year % 100 === 0)
            $esBisiesto = false;

        else if ($year % 4 === 0 || $year % 400 === 0)
            $esBisiesto = true;

        else 
            $esBisiesto = false;
        
        return $esBisiesto;
            
    }