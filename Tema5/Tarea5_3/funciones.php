<?php

function crearDatosAlumno($usuarios) {
    
    $datos = [];
    foreach($usuarios as $usuario) {
        $datos[$usuario['usuario']] = 0;
    }

    return $datos;
}

function sumarVoto($alumno) {
    $_SESSION['datos'][$alumno] += 1;
}