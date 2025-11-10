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

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];  

    $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES);
    $user = explode(':', $usuarios[0]);
    

    foreach ($usuarios as $usuarioIndividual){

        $user = explode(':', trim($usuarioIndividual)); // Se separan ambos datos y se quitan los espacios con trim

       // echo $user[0] . ' : ' . $user[1] . '<br>':
        // if ($usuario == $usu . ":" . $pass){}

        if($usuario === $user[0] && $password === $user[1]){
            $_SESSION['loginusu'] = $usuarioIndividual; //Creamos la sesión
            header("Location: index.php");
        }
        
    }
    echo "<p style='color: red; font-weight: bold;'>Error: Usuario o contraseña incorrectos.</p>";
    
}