<?php

if (isset($_POST)) {
    $segundos = $_POST["segundos"];
    $minutos = (int)($segundos / 60);
    $segundosRestantes = $segundos % 60;

    echo "$segundos segundos son $minutos minutos y $segundosRestantes segundos";
}
