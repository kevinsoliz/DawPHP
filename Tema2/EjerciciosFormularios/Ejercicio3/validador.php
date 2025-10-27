<?php
include "conversor.php"; //incluimos el archivo que contiene la función

if (isset($_POST)) {
    $segundos = $_POST["segundos"];
    
    try{
        if(empty($segundos)) //Verifica si la variable está vacia.
            throw new Exception("Rellena los segundos."); 

        else if(!is_numeric($segundos) && $segundos >= 0) // Verifica que la variable sea un número y que este sea mayor o igual que 0.
            throw new Exception("Introduce un número.");
    
        else 
            conversorSaM($segundos);
        
    }catch(Exception $e){
        $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo $mensaje;
        header("refresh: 5 url=formulario.html");
    }


}
