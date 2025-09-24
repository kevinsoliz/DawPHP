<?php
for ($i = 1; $i <= 100; $i++) {
    echo "$i, ";
}
echo "<br>";

$contador = 10;
while ($contador > 0) {
    echo "$contador-";
    $contador--;
}
echo "<br>";

$numeros = [1, 2, 3, 4, 5];

for ($i = 0; $i < count($numeros); $i++) {
    echo $numeros[$i] . " ";
}
echo "<br>";

foreach ($numeros as $numero) {
    echo $numero . " ";
}
echo "<br>";

$persona = [
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "Madrid"
];

foreach ($persona as $key => $value) {
    echo "$key: $value <br>"; 
}
echo "<br>";
