<?php

if (isset($_GET)) {
    $peso = $_GET['peso'];
    $altura = $_GET['altura'] / 100;

    $imc = $peso / $altura ** 2;

    echo "Con un peso de $peso kg y una altura de " . $altura * 100 . " cm, tu índice de masa corporal es $imc";
}
