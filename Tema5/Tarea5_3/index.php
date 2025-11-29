<?php
session_start();
include_once 'conexion.php';
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
    <p>Introduzca las credenciales para inciar sesión<p>

    <form method="post" action="login.php">

        <label>Usuario</label>
        <input type="text" name="usuario"><br>

        <label for="password">Contraseña</label>
        <input type="text" name="password" id="password">
        <br>
        
        <button type="submit">Entrar</button>
    </form>
    
    <?php
    if (isset($_SESSION['error_message'])) {
        
        echo '<p style="color:red;">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']); // Limpia el mensaje de error después de mostrarlo
    }
    ?>
    

</body>
</html>