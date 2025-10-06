<?php

if (isset($_POST)) {
    $pies = $_POST['pies'];
    $pulgadas = $_POST['pulgadas'];

    $centimetros = ($pies * 12 + $pulgadas) * 2.54;

    echo "$pies pies y $pulgadas pulgadas son $centimetros centimetros.";
}
