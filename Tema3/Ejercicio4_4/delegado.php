<?php
session_start();
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Esta es la web del delegado</h1>
    <h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>
</body>
</html>