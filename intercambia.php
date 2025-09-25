<?php
function intercambia($a, $b, &$a2, &$b2){
    $a2 = $b;
    $b2 = $a;
    echo "a = $a2 <br>";
    echo "b = $b2 <br>";

}

$a2 = 0;
$b2 = 0;

$a = 3;
$b = 10;
intercambia($a, $b, $a2, $b2);