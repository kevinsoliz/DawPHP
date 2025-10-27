<?php

    function conversorTemperatura($temperatura, $tipoTemperatura){

        if($tipoTemperatura === 'ºC'){
            $resultado = ($temperatura * (9 / 5)) + 32;
            echo "$temperatura$tipoTemperatura son $resultado"."ºF";
        }

        else{
            $resultado = ($temperatura - 32) * (5 / 9);
            echo "$temperatura$tipoTemperatura son $resultado"."ºC";
        }
    }