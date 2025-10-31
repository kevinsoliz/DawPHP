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

        label {
            display: block;
        }

        input {
            width: 100%;
            border-radius: 5px;
            border: 1px solid grey;
        }

        button {
            width: 50%;
            background-color: dodgerblue;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #1563f1;
        }

    </style>
</head>
<body>
<form action="<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <br>
    <label for="edad">Edad</label>
    <input type="text" name="edad" id="edad">
    <br>
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <br>
    <br>
    <label for="curso">Curso</label>
    <input type="text" name="curso" id="curso">
    <br>
    <br>
    <button type="submit">Enviar</button>

</form>
</body>
</html>

<?php
include_once "funciones.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad   = $_POST['edad'];
    $email  = $_POST['email'];
    $curso  = $_POST['curso'];
    $array  = [];

    try {
        if (empty($nombre) || empty($edad) || empty($email) || empty($curso)) {
            throw new Exception("Rellena todos los campos.");
        }
        elseif (!is_numeric($edad) || ($edad < 16 || $edad > 99)) {
            throw new Exception("La edad no es un número o eres menor de edad.");
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El email no es válido.");
        }
        else {
            $array = agregarDato($array, $nombre, $edad, $email, $curso);
            foreach ($array as $key => $valores) {
                echo $key . ": ";
                foreach ($valores as $valor) {
                    echo $valor . " ";
                }
                echo "<br>";
            }
        }
    }
    catch (Exception $e) {
        echo "<p style='color: red; font-weight: bold;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        header("refresh: 3 url=formulario.php");
    }
}