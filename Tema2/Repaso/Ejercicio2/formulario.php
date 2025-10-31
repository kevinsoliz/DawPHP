<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        form {
            width: 50%;
        }

        input {
            border: 1px solid grey;
            border-radius: 5px;
            padding: 5px 10px;
        }

        button {
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            color: white;
            background: dodgerblue;
        }

        button:hover {
            background: #1563f1;
        }
    </style>
</head>
<body>
<form action="<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <legeng>Cálculos estadísticos:</legeng>
    <p>Escribe los valores que quieres introducir:</p>
    <label for="cantidad">Cantidad</label>
    <input type="text" name="cantidad" id="cantidad">
    <br>
    <br>
    <button type="submit">Mostra formulario de entrada</button>
    <br>
</form>
</body>
</html>

<?php
include_once "funciones.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cantidad"])) {
        $cantidad = $_POST["cantidad"];

        try {
            if (empty($cantidad)) {
                throw new Exception("La cantidad es obligatoria");
            }
            elseif (!is_numeric($cantidad)) {
                throw new Exception("Debe sere un número.");
            }
            else {
                mostrarFormulario($cantidad);
            }
        }
        catch (Exception $e) {
            echo "<p style='font-weight: bold; color: red;'> Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            header("refresh: 5 url=formulario.php");
        }
    }
    if (isset($_POST["numeros"])) {
        $numeros  = $_POST["numeros"] ?? [];
        $opciones = $_POST["opciones"] ?? [];


        try {
            if (true) {
                foreach ($numeros as $numero) {
                    if (!is_numeric($numero)) {
                        throw new Exception("Rellena todos los campos de número.");
                    }
                }
            }
            if (empty($opciones)) {
                throw new Exception("Esocoge al menos una opcion.");
            }

            else {
                echo "<br>";
                foreach ($opciones as $opcion) {
                    switch ($opcion) {
                        case "suma":
                            echo "La suma de los valores es: " . sumar($numeros) . "<br>";
                            break;
                        case "media":
                            echo "La media de los valores es: " . media($numeros) . "<br>";
                            break;
                        case "maximo":
                            echo "El máximo de los valores es: " . max($numeros) . "<br>";
                            break;
                        case "minimo":
                            echo "El mínimo de los valores es: " . min($numeros) . "<br>";
                            break;
                        default:
                            echo "Ha ocurrido un error.";
                    }
                }
            }
        }
        catch (Exception $e) {
            echo "<p style='font-weight: bold; color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
            header("refresh:3; url=formulario.php");
        }
    }
}

