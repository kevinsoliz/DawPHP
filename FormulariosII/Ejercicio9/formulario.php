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
        width: 80%;
    }
    </style>
</head>
<body>
     <legend>Calculos estadísticos</legend>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Escribe cuántos valores quieres introducir.</p>
        <label for="cantidad">Cantidad</label>
        <input type="text" id="cantidad" name="cantidad">

        <button type="submit">Mostrar formulario de entrada</button>

    </form>
   
</body>
</html>

<?php

     // Incluye el archivo con las funciones
    include_once 'funciones.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $cantidad = $_POST['cantidad'];

        try {

            if(empty($cantidad))
              throw new Exception("Indica una cantidad.");

            else if (!is_numeric($cantidad)) 
                throw new Exception("Introduce un número válido.");
            
            else if ($cantidad <= 0)
                throw new Exception("Debe ser mayor que 0. ");

            else {
               mostrarFormulario($cantidad);
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 4 url=formulario.php");
        }
    }
    ?>