<?php

function suma($array){
    $suma = 0;
    foreach ($array as $elemento){
        $suma += $elemento;
    }
    return $suma;
}

function media($array){
    $total = suma($array);
    return ($total / count($array));
}

function maximo($array){
    $maximo = 0;
    foreach ($array as $elemento){
        if($elemento > $maximo){
            $maximo = $elemento;
        }
    }
    return $maximo; 
}

function minimo($array){
    $minimo = $array[0];
    foreach ($array as $elemento){
        if($elemento < $minimo){
            $minimo = $elemento;
        }
    }
    return $minimo; 
}

function mostrarFormulario($cantidad){
    echo "<form action= '"; htmlspecialchars($_SERVER['PHP_SELF']);  echo "' method='post'>";
    for($i = 1; $i <= $cantidad; $i++){
        echo "    
            <label for='numero'>Numero$i</label>
            <input type='text' id='numero' name='numero[]'>
            <br>
        ";
    }
    echo"
        <label for='suma' class='label-inline'>Suma</label>
        <input type='checkbox' id='suma' name='opcion[]' value='suma'>
        <label for='media' class='label-inline'>Media</label>
        <input type='checkbox' id='media' name='opcion[]' value='media'>
        <label for='maximo' class='label-inline'>Máximo</label>
        <input type='checkbox' id='maximo' name='opcion[]' value='maximo'>
        <label for='minim' class='label-inline'>Mínimo</label>
        <input type='checkbox' id='minimo' name='opcion[]' value='minimo'>
        <button type='submit' name='enviar'>Calcular entrada</button>
        ";
    echo "</form>";

    if (isset($_POST['enviar'])) {
        $numeros = $_POST['numero'] ?? [];
        $opciones = $_POST['opcion'] ?? [];
        $sonNumeros = true;
        try {

            if(empty($numeros))
              throw new Exception("Rellena todos los números.");

            // else if ($sonNumeros){
            //     $contador = 0;

            //     while($sonNumeros && $contador < count($numeros)){
            //         if(!is_numeric($numeros[$contador])){
            //             throw new Exception ("El valor " . $numero[$contador] . " no es válido.");
            //         }
            //    }
            // }
                   
            else {
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
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
}

