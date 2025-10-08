<?php

include("calculo.php");

if($_POST){
    
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $imc = imc($altura, $peso);

    echo "Con un peso de $peso kg y una altura de " . $altura * 100 . " cm, tu índice de masa corporal es $imc";
}
