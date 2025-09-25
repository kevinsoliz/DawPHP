<?php
function intercambia(&$a, &$b){
    $c = $a;
    $a = $b;
    $b = $c;
    echo "a = $a <br>";
    echo "b = $b <br>";

}


$a = 3;
$b = 10;
intercambia($a, $b);