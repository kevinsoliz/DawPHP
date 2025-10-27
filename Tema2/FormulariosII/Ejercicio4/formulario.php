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
    <legend>Calcula sumatorios o factoriales</legend>

    <p>Escribe un número e indica si quieres que calcule el factorial o el sumatorio desde 1 hasta el número:</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="numero">Número</label>
    <input type="text" id="numero" name="numero">

    <input type="checkbox" name="opcion[]" value="factorial" id="factorial" >
    <label for="factorial" class="label-inline">Factorial</label>

    <input type="checkbox" name="opcion[]" value="sumatorio" id="sumatorio">
    <label for="sumatorio" class="label-inline">Sumatorio</label>
    
    <button type="submit">Calcular</button>

    </form>
</body>
</html>

<?php

     // Incluye el archivo con las funciones
    include_once 'funciones.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $numero = $_POST['numero']; 
        $opcion = $_POST['opcion'] ?? [];

        try {

            if(empty($numero) || empty($opcion))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($numero)) 
                throw new Exception("Introduce un número válido.");
            
            else if ($numero < 0)
                throw new Exception("Debe ser mayor que 0. ");

            else {
                if($opcion[0] === "factorial" && count($opcion) === 1){
                   $factorial = factorial($numero);
                   echo "El factorial de $numero es $factorial. <br>";
                }
                else if($opcion[0] === "sumatorio" && count($opcion) === 1) {
                    $sumatorio = sumatorio($numero);
                    echo "La suma desde 1 hasta $numero es $sumatorio. <br>";
                }
                else {
                    $factorial = factorial($numero);
                    echo "El factorial de $numero es $factorial. <br>";
                    $sumatorio = sumatorio($numero);
                    echo "La suma desde 1 hasta $numero es $sumatorio. <br>";
                }
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>
