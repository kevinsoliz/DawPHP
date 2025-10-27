<?php
if($_POST){
    $n = (int)$_POST["n"];

    for($i = 0 ; $i < $n ; $i++){
        $numero = rand(1, 6);
        echo $numero . "<br>";
    }
}