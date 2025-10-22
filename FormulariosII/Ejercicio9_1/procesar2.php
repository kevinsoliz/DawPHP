<?php
 // Incluye el archivo con las funciones
    include_once 'funciones.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $numeros = $_POST['numero'] ?? [];
        $opciones = $_POST['opcion'] ?? [];
        $sonNumeros = true;
        try {

            if(empty($numeros))
              throw new Exception("Rellena todos los números.");

            else if ($sonNumeros){
               foreach($numeros as $elemento){
                if(!is_numeric($elemento)){
                    throw new Exception("Este valor: $elemento es inválido.");
                    break;
                }
               }
            }
                   
            else {
                echo "Los valores introducidos son ";
                    foreach($numeros as $num)
                        echo "$num  ";


               foreach($opciones as $opcion){

                switch($opcion){
                    case 'suma':
                       echo "La suma de los valores es " . suma($numeros);
                       break;
                    case "media":
                        echo "La media de los valores es " . media($numeros);
                        break;
                    case "maximo":
                        echo "El valor más grande es " .  maximo($numeros);
                        break;
                    case "minimo":
                        echo "El valor más pequeño es " . minimo($numeros);
                        break;
                        
                }
               }
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }