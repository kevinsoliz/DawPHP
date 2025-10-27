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
     <legend>Dibujar columnas</legend>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <label for="columnas">Número de columnas</label>
        <input type="text" id="columnas" name="columna">

        <button type="submit">Dibujar</button>

    </form>
   
</body>
</html>

<?php

     // Incluye el archivo con las funciones
    include_once 'funcion.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $columnas = $_POST['columna'];

        try {

            if(empty($columnas))
              throw new Exception("Indica una número de columnas.");

            else if (!is_numeric($columnas)) 
                throw new Exception("Introduce un número válido.");
            
            else if ($columnas <= 0)
                throw new Exception("Debe ser mayor que 0. ");

            else {
               dibujarColumnas($columnas);
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 4 url=formulario.php");
        }
    }
    ?>