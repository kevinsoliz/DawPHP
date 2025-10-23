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

            if ($sonNumeros){
                $contador = 0;

                while($sonNumeros && $contador < count($numeros)){
                    if(!is_numeric($numeros[$contador])){
                        throw new Exception ("El valor " . $numeros[$contador] . " no es válido.");
                        
                    }
                    $contador++;
               }
               
            }
                   
            
                echo "Los valores introducidos son ";
                    foreach($numeros as $num)
                        echo "$num  ";
                echo "<br>";


               foreach($opciones as $opcion){

                    switch($opcion){
                        case 'suma':
                        echo "La suma de los valores es " . suma($numeros) . "<br>";
                        break;
                        case "media":
                            echo "La media de los valores es " . media($numeros) . "<br>";
                            break;
                        case "maximo":
                            echo "El valor más grande es " .  maximo($numeros) . "<br>";
                            break;
                        case "minimo":
                            echo "El valor más pequeño es " . minimo($numeros) . "<br>";
                            break;
                        default:
                            echo ":(";
                            break;
                            
                    }
               }
            
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 5 url=formulario.php");
        }
    }