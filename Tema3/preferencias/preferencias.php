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
    <form action="guarda_prefs.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        <label for="color">Color</label>
        <input type="color" name="color" id="color">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>