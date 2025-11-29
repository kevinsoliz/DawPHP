<?php
session_start();
include_once 'conexion.php';
include 'funciones.php';



if($_POST) {
    $delegado = $_POST['alumno'];
    
    if($delegado != $_SESSION['usuario'] && !$_SESSION['votado']){
        //sumo un voto:
        sumarVoto($delegado);
        //ordeno:
        arsort($_SESSION['datos']);
        //Cambio el booleano:
        $_SESSION['votado'] = true;
        //redirijo:
        header('Location: alumno.php');
        exit();
    }
    else {
        $_SESSION['error'] = 'No puedes votarte a ti mismo y tampoco puedes votar más de una vez.';
        header('Location: alumno.php');
        exit();
    }
            
}
//Por si se pulsa el botón de votar sin haber seleccionado un alumno
else {
    header('Location: alumno.php'); 
    exit();
}
