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
    <legend>Tabla de multiplicar</legend>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="horizontal">Horizontal</label>
    <input type="text" id="horizontal" name="horizontal">

    <label for="vertical">Vertical</label>
    <input type="text" id="vertical" name="vertical">
    
    <button type="submit">Calcular</button>

    </form>
</body>
</html>

<?php

     // Incluye el archivo con las funciones
    include_once 'tablaMultiplicar.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $horizontal = $_POST['horizontal'];
        $vertical = $_POST['vertical'];

        try {

            if(empty($horizontal) || empty($vertical))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($horizontal) || !is_numeric($vertical)) 
                throw new Exception("Introduce un número válido.");
            
            else if ($horizontal < 0 || $vertical < 0)
                throw new Exception("Debe ser mayor que 0. ");

            else {
               tablaMultiplicar($vertical, $horizontal);
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>