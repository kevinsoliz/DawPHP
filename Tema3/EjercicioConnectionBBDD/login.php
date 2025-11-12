<?php
session_start();
include('conexion.php');

$nombre = $_POST["usuario"];
$password = $_POST["pass"];

$_SESSION['usuario'] = $nombre;

try {

    $consulta = "SELECT * from personal WHERE usuario=:nombre AND password=:pass";
    $sql = $conn->prepare($consulta);
    $sql->bindParam(":nombre", $nombre);
    $sql->bindParam(":pass", $password);

    $sql->execute();

} catch (PDOException $e){

    echo $e->getMessage();

}

if ($sql->rowCount() > 0) {

    header("Location: web_cliente.php");

} else { 
    // Autenticación fallida 
    $_SESSION['error_message'] = 'Usuario o contraseña incorrectos.';
    header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión 
    exit(); // Es crucial llamar a exit()

}