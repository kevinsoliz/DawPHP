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
 
     <h1>Años bisiestos</h1>

     <legend>Introduce un año y calcularé si es bisiesto o no</legend>
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
         <label for="año">Año</label>
         <input type="text" name="año" id="año" placeholder="1940">
         <button type="submit">Calcular</button>

     </form>

</body>
</html>

<?php

    // Incluye el archivo con las funciones
    include_once 'esBisiesto.php';

    // Procesa el formulario si se ha enviado
    if ($_POST) {
        $year = $_POST['año']; // Obtiene el año del formulario

        try {

            if(empty($year))
              throw new Exception("Rellena el formulario.");

            else if (!is_numeric($year)) 
                throw new Exception("Introduce un número válido");

            else {
              if(esBisiesto($year))
                echo "El año $year es una año bisiesto por que $year es múltiplo de 400.";

              else
                echo "El año $year no es bisiesto. ";
            }
                
            
        } 
        catch (Exception $e){
            $mensaje = "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo $mensaje;
            header("refresh: 3 url=formulario.php");
        }
    }
    ?>

