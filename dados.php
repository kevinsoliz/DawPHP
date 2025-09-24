<?php
$aleatorio = rand(1, 6);
if($aleatorio == 6)
    echo "Enhorbuena, máxima puntuación!";
else if($aleatorio == 5)
    echo "Has estado cerca";
else if($aleatorio == 4)
    echo "Prueba otra vez";
else if($aleatorio == 3)
    echo "Has sacado la mitad.";
else if($aleatorio == 2)
    echo "Casi nada.";
else
    echo "La mínima puntuación, lo siento.";
