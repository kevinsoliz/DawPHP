<?php
// Incluye la función necesaria para hacer el cálculo del IMC.
include("calculo.php");

if($_POST){
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];

    try{
        //Verica si las variables están vacías.
        if(empty($altura && $peso))
            throw new Exception("El formulario está vacío.");
        else{

            //Verifica si la variable es un número y distinto de 0 para la altura y el peso y lanza excepciones si cumple con lo requerido.
            if(!is_numeric($altura) && $alura <= 0){
                throw new Exception("Introduce un número válido o distinto de 0 para el campo de altura.");
            }
    
            if(!is_numeric($peso) && $peso <= 0){
                throw new Exception("Introduce un número válido o distinto de 0 para el campo de peso.");
            }
    
            
            //Si la verificación es válida se ejecutará el cálculo. 
    
                //Se hace un cast para trabajar con tipos number enteros.
                $altura = (int)$altura;
                $peso = (int)$peso;
    
                //Llamada a la función.
                $imc = imc($altura, $peso);
            
                echo "Con un peso de $peso kg y una altura de " . $altura . " cm, tu índice de masa corporal es $imc";
            
            //Captura la excepción y redirige al usuario a la página del formulario.
        }    
    }
 
    catch (Exception $e) {
        
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 5 url=Ejercicio1.html");
        
    }

}
