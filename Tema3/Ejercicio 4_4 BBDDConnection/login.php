<?php

session_start();
include 'conexion.php';
/** @var PDO $conexion */

$nombre   = $_POST['usuario'];
$password = $_POST['password'];

$_SESSION['usuario'] = $nombre;

try {
    $consulta = "SELECT * FROM personal WHERE nombre = :nombre AND pass = :pass";

    $sql = $conexion->prepare($consulta);

    $sql->bindParam(":nombre", $nombre);
    $sql->bindParam(":pass", $password);

    $sql->execute();
}
catch (PDOException $e) {
    echo $e->getMessage();
}

if ($sql->rowCount() > 0) {
    header("Location: web_cliente.php");
}
else {
    $_SESSION['error_message'] = 'Usuario o password incorrectos';
    exit();
}