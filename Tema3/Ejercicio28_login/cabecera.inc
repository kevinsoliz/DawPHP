<?php
session_start();

if (!isset($_SESSION['loginusu'])){ //Si loginusu no existe redirige a login.php
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: dodgerblue;
            color: yellow;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="pag1.php">Página 1</a>
        <a href="pag2.php">Página 2</a>
        <a href="logout.php">Cerrar sesión</a>
    </nav>
</body>
</html>