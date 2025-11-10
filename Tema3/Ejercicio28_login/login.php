<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        <label for="password">Contraseña</label>
        <input type="text" name="password" id="password">

        <button type="submit">Entrar</button>
    </form>
</body>
</html>

<?php 
session_start();

if($_POST){

    $usu = $_POST['usuario'];
    $pass = $_POST['password'];  

    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
   

    foreach ($usuarios as $usuario){

        if ($usuario == $usu . ":" . $pass){

            $_SESSION['loginusu'] = $usu; //Creamos la sesión
            header("Location: index.php");
        }
        
    }
    echo "<p style='color: red; font-weight: bold;'>Error: Usuario o contraseña incorrectos.</p>";
    
}