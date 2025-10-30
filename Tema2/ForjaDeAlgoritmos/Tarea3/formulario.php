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
<legend>El Archivo Maestro del gremio</legend>

<form method="post" action="<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <label for="cantidad">Cantidad</label>
    <input type="text" id="cantidad" name="cantidad">

    <label for="rareza">Rareza</label>
    <div id="rareza">

        <label for="comun" class="label-inline">Común</label>
        <input type="radio" name="comun" id="comun">
        <label for="raro" class="label-inline">Raro</label>
        <input type="radio" name="raro" id="raro">
        <label for="epico" class="label-inline">Épico</label>
        <input type="radio" name="epico" id="epico">
    </div>
    <button type="submit">Enviar</button>
</form>

</body>
</html>