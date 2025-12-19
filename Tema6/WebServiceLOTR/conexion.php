<?php


$host = 'localhost';
$dbname = 'mordor';
$username = 'root';
$password = '';


try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexión exitosa a la base de datos." . $dbname;
} catch (PDOException $pe) {

    die("Could not connect to the database $dbname :" . $pe->getMessage());

}