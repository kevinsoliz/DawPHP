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
        form, table {
            width: 80%;
        }
    </style>
</head>
<body>
<legend>El Reloj del Cronometrador: Procesamiento Iterativo de Múltiples Entradas</legend>

<form method="post" action="<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "
            <label for='numero$i'>Numero $i</label>
            <input type='text' name='codigo_mision[]' id='numero$i'>
            ";
    }
    ?>
    <button type="submit">Enviar</button>
</form>

</body>
</html>

<?php
include_once 'funciones.php';

if ($_POST) {
    $codigoMision = $_POST['codigo_mision'] ?? [];

    try {
        if (true) {
            foreach ($codigoMision as $numero) {
                if (empty($numero)) {
                    throw new Exception("Rellena el formulario.");
                }
            }
        }
        if (true) {
            foreach ($codigoMision as $numero) {
                if (!is_numeric($numero)) {
                    throw new Exception("El valor $numero no es un número.");
                }
            }
        }
        $resultados_procesads = [];
        foreach ($codigoMision as $numero) {
            if ($numero > 50) {
                $resultados_procesados["original"][]  = $numero . " ALTO_RIESGO";
                $resultados_procesados["duplicado"][] = dobleVerificacion($numero);
            }
            else {
                $resultados_procesados["original"][]  = $numero;
                $resultados_procesados["duplicado"][] = dobleVerificacion($numero);
            }
        }

        echo "<table style='border: 1px solid grey; padding: 10px;'>
               <tr>";

        foreach ($resultados_procesados as $clave => $valor) {
            echo "<th>$clave</th>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($resultados_procesados as $clave => $valores) {
            echo "<td>";
            foreach ($valores as $valor) {
                echo "$valor<br>";
            }
            echo "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
    catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . htmlspecialcharts($e->getMessage()) . "</p>";
        header("refresh:3; url=formulario.php");
    }
}

?>