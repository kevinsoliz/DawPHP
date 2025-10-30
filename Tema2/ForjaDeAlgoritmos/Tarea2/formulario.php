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

<form method="post" action="<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <?php
    for ($i = 0; $i < 6; $i++) {
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
        if (empty($codigoMision)) {
        }
        else {
        }
    }
    catch (Exception $e) {
        echo "<p style='color:red;'>Error: " . htmlspecialcharts($e->getMessage()) . "</p>";
        header("refresh:3; url=formulario.php");
    }
}

?>