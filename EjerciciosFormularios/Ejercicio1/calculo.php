<?php

function imc ($altura, $peso){
    $altura /= 100;
    return ($peso / $altura ** 2);
}