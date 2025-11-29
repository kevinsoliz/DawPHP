<?php

session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Iniciar Sesión</h2>

<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error_message'] . "</p>";
    unset($_SESSION['error_message']);
}
?>

<form action="login.php" method="post">
    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="usuario">
    <label for="password">Contraseña</label>
    <input type="text" id="password" name="password">
    <button type="submit">Entrar</button>
</form>
</body>
</html>
