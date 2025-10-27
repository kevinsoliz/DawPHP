<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="numero">Número</label>
        <input type="text" id="numero" name="numero">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>


<?php

if($_POST){
    $limite = $_POST["numero"];
    $baraja = [
        "DIAMANTES" => "ROJO",
        "CORAZONES" => "ROJO",
        "TREBOLES" => "NEGRO",
        "PICAS" => "NEGRO"
    ]; 

    try{
        
        if(empty($limite))
            throw new Exception ("Rellena el formuluario.");
    
        else if (!($limite > 1 && $limite <= count($baraja)))
            throw new Exception ("Debe ser menor o igual que " . count($baraja) . " y mayor que 1.");
        

        else { 
            function mostrarAleatorio($array, $limite){

                $valores = ARRAY_RAND($array, $limite);

                    foreach ($valores as $key)
                        echo "$key: " . $array[$key] . "<br>";
                
            }
            
            mostrarAleatorio($baraja, $limite);
        }
    } catch (Exception $e){
         $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=baraja.php");
    }

}