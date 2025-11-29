<?php

function crearDatosAlumno($usuarios) {
    
    $datos = [];
    foreach($usuarios as $usuario) {
        $datos[] = [
            'alumno' => $usuario['usuario'],
            'votos' => 0
        ];
    }

    return $datos;
}

function sumarVoto($alumno) {
    $alumno['votos'] += 1;
}