<?php 
include 'conexion.php';

$consulta = 'SELECT * FROM personajes';
$sql = $conn -> prepare($consulta);
$sql -> execute();
$personajes = $sql -> fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($personajes);

echo $json;