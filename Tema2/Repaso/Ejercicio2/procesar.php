<?php

include_once 'funciones.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
