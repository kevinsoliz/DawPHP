<?php

    function conversorTemperatura($temperatura, $tipoTemperatura){
        $resultado = 0;

        if($tipoTemperatura === 'celsius')
            $resultado = ($temperatura * (9 / 5)) + 32;

        else
            $resultado = ($temperatura - 32) * (5 / 9);

        return $resultado;
    }