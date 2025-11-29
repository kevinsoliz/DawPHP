<?php

$host     = 'localhost';
$dbname   = 'Instituto2';
$username = 'root';
$password = '';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado correctamente a la base de datos $dbname";
}
catch (PDOException $e) {
    die ("No su pudo conectar a la base de datos $dbname: " . $e->getMessage());
}