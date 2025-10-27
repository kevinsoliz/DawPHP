<?php
$nota1 = 4.5;
$nota2 = 8;
$nota3 = 10;

if ($nota1 > $nota2 && $nota1 > $nota3)
    echo "La nota $nota1 es mayor que las nota $nota2 y $nota3";
else if($nota2 > $nota3 && $nota2 > $nota3)
    echo "La nota $nota2 es mayor que la nota $nota1 y $nota3";
else
    echo "La nota $nota3 es mayor que la nota $nota1 y $nota2";
