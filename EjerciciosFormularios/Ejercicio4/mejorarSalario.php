<?php

if(isset($_POST)) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $salario = $_POST['salario'];

    if($salario < 1000){
        if($edad < 30)
            $salario = 1100;
        else if($edad >= 30 && $edad < 45)
            $salario += $salario * 0.3;
        else 
            $salario += $salario * 0.15;
    }
    else if($salario >= 1000 && $salario < 2000){
        if($edad >= 45)
            $salario += $salario * 0.3;
        else
            $salario += $salario * 0.1;
    }

    echo "$nombre $apellidos, tu salario será de $salario €";
}