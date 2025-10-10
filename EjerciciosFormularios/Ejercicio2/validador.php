<?php
include "conversor.php"; //Incluye el archivo externo con la función.
if (isset($_POST)) {
    $pies = $_POST['pies'];
    $pulgadas = $_POST['pulgadas'];

    try{ 
        //la 
        if (empty($pies && $pulgadas)) //Verifica si las variables están vacías.
            throw new Exception("Rellena el formulario.");

        else if (!is_numeric($pies) || !is_numeric($pulgadas)) //Verifica si las variables no son números.
            throw new Exception("Uno de los campos no es un número.");

        else {
            
            $centimetros = conversorCM($pies, $pulgadas);
            echo "$pies pies y $pulgadas pulgadas son $centimetros centimetros.";
        }

    }catch(Exception $e){
        $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo $mensaje;
        header("refresh: 5 url=formulario.html");
    }

}
