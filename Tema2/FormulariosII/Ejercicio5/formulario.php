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
    <legend>Dibujar rectángulo</legend>

    <p>Escribe la altura y la anchura y dibujaré un rectángulo de estrellas de ese tamaño.</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="altura">Altura</label>
    <input type="text" id="altura" name="altura">

    <label for="anchura">Anchura</label>
    <input type="text" id="anchura" name="anchura">

    
    <button type="submit">Dibujar</button>

    </form>
</body>
</html>

<?php

     // Incluye el archivo con las funciones
    include_once 'rectangulo.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $altura = $_POST['altura'];
        $anchura = $_POST['anchura'];

        try {

            if(empty($altura) || empty($anchura))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($altura) || !is_numeric($anchura)) 
                throw new Exception("Introduce un número válido.");
            
            else 
                rectangulo($altura, $anchura);
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>
