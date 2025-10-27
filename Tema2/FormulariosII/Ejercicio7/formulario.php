<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css"
    />
    <style>
    form {
        width: 50%;
    }
    </style>
</head>
<body>
    <legend>Comprueba primalidad</legend>

    <p>Escribe un número entero positivo y te diré si es un número primo.<p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="numero">Número</label>
    <input type="text" id="numero" name="numero">
    
    <button type="submit">Calcular</button>

    </form>
</body>
</html>

<?php

     // Incluye el archivo con las funciones
    include_once 'esPrimo.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $numero = $_POST['numero'];

        try {

            if(empty($numero))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($numero)) 
                throw new Exception("Introduce un número válido.");
            
            else if ($numero < 0)
                throw new Exception("Debe ser mayor que 0. ");

            else {
                if(esPrimo($numero))
                    echo "El número $numero es primo";
                else
                    echo "El número $numero no es primo";
                
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>
