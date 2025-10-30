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
<legend>El Cifrado del Barón Rojo</legend>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">

    <label for="clave">Clave</label>
    <input type="text" id="clave" name="clave">

    <button type="submit">Enviar</button>

</form>

</body>
</html>

<?php
include_once 'funciones.php';

if ($_POST) {

    $nombre = $_POST['nombre']; //Recogemos el valor introducido en la variable nombre para trabajar con él.
    $clave = $_POST['clave']; // Recogemos el valor introducido en la variable clave para trabajar con él.

    try {

        if (!validarCampos($nombre, $clave)) //LLamamos a nuestra función para que nos devuelva un valor booleano

            throw new Exception ("Rellena el formulario.");


        else if (!is_numeric($clave) || is_numeric($nombre)) //Ya sea que clave sea un string o nombre un número devolveremos un error.

            throw new Exception ("Uno de los campos no es valido.");


        else {
            if ($nombre === "Maximiliano" || esNumSuerte($clave)) //Nuestra función devuelve un valor booleano confirmando que clave pertenezca a nuestro array de la suerte
                echo "Bienvenido Max!";

            else
                echo "Envio realizado correctamente.";

        }

    } catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        header("refresh: 3 url=formulario.php");
    }
}

?>