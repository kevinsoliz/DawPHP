<?php

$datos = [
    ['cod' => 1, 'nombre' => 'Tren'],
    ['cod' => 2, 'nombre' => 'Barco'],
    ['cod' => 3, 'nombre' => 'Avión'],
    ['cod' => 4, 'nombre' => 'Motocicleta']
];

$datosJson = json_encode($datos);
echo $datosJson;