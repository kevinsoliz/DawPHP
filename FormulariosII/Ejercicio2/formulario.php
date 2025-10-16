<?php
$resultaod = '';
?>
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
    <legend>Conversor de temperatura</legend>
    <p>Escribe una temperatura &#40;Celsius o Farenheit&#41; y la convertiré a la otra unidad &#40;Celsius o Farenheit&#41; </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="temperatura">Temperatura</label>
    <input type="text" id="temperatura" name="temperatura">
    <select name="tipoTemperatura">
        <option value="celsius">Celsius</option>
        <option value="farenheit">Farenheit</option>
    </select>
    <button type="submit">Convertir</button>
    <input type="text" readonly value="<?php echo $resultado; ?>">
    </form>
</body>
</html>

<?php

    // Incluye el archivo con las funciones
    include_once 'conversorTemperatura.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $temperatura = $_POST['temperatura']; 
        $tipoTemperatura = $_POST['tipoTemperatura'];

        try {

            if(empty($_POST) && empty($tipoTemperatura))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($temperatura)) 
                throw new Exception("Introduce un número válido");

            else {
             $resultado = conversorTemperatura($temperatura, $tipoTemperatura);
             //echo "<input type=\"text\" value=\"$resultado\" readonly>";
             
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>
