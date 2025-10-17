
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
    <legend>Conversor de distancias</legend>
    <p>Escribe una distancia&#40;en centímetros&#41; y la convertiré a kilómetros, metros y centímetros.</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="distancia">Distancia</label>
    <input type="text" id="distancia" name="distancia">
    <button type="submit">Convertir</button>
    </form>
</body>
</html>

<?php

    // Incluye el archivo con las funciones
    include_once 'conversorDistancia.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $distancia = $_POST['distancia']; 

        try {

            if(empty($distancia))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($distancia)) 
                throw new Exception("Introduce un número válido");

            else {
                conversorDistancia($distancia); 
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>
