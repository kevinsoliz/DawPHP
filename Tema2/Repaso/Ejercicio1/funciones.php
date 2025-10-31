<?php

function agregarDato($array, $nombre, $edad, $email, $curso) {
    $array = [
        "nombre" => [$nombre],
        "edad"   => [$edad],
        "email"  => [$email],
        "curso"  => [$curso]
    ];

    return $array;
}
