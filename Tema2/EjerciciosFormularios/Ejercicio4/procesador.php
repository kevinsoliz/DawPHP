<?php
include "calculo.php";

if(isset($_POST)) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $salario = $_POST['salario'];

    //echo gettype($nombre);

    try{ 

        if (empty($nombre && $apellidos && $edad && $salario)) //Verifica que ninguna de las variables esté vacía.
            throw new Exception ("Rellena el formulario.");
        
        else if (!preg_match('/[a-zA-Z]/', $nombre)|| !preg_match('/[a-zA-Z]/', $apellidos)) //Verifica que las variables string contengan datos string. is_string() no fuciona.
            throw new Exception ("El nombre o los apellidos no son válidos, introducelos de nuevo.");

        else if (!is_numeric($edad) || !is_numeric($salario))//Verifica que las variables numericas contengan datos numéricos.
            throw new Exception ("La edad o el salario no son válidos, introduce datos númericos.");

        else {
            $salario = mejoraSalarial($salario, $edad);
            echo "$nombre $apellidos, tu salario será de $salario €";
        }

    } catch (Exception $e){
            
        $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo $mensaje;
        header("refresh: 5 url=mejoraSalarial.html");
    }
}