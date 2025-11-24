<?php
session_start();
include_once 'conexion.php';

if($_POST) {
    $alumno = $_POST['alumno'];

    $_SESSION['votos'] = 0;
    $_SESSION['votos'] += 1;
    header('Location: alumno.php'):
    exit();
}