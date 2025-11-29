<?php
session_start();
include_once 'conexion.php';
include 'funciones.php';



if($_POST) {
    $delegado = $_POST['alumno'];

    if($delegado != $_SESSION['usuario']){
        //sumo un voto:
        sumarVoto($delegado);
        //ordeno:
        arsort($_SESSION['datos']);
        //redirijo:
        header('Location: alumno.php');
        exit();
    }
    else {
        $_SESSION['error'] = 'No puedes votarte a ti mismo.';
        header('Location: alumno.php');
        exit();
    }
            
}
else {
    header('Location: alumno.php');
    exit();
}
