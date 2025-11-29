<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>


    <form method="post" action="login.php">
        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>
        <label>Contraseña:</label>
        <input type="password" name="pass" required><br><br>
        <input type="submit" value="Entrar">
    </form>
    
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p style="color:red;">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']); // Limpia el mensaje de error después de mostrarlo
    }
    ?>

</body>
</html>