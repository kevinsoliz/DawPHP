<?php

function calculaDescuento($precio, $descuento = 0){
    return $precio - ($precio * $descuento / 100);
}

echo "Precio de 250€ con descuento del 10% = " . calculaDescuento(250, 10) . "€ <br>";

echo "Precio de 85€ con descuento del 0 = " . calculaDescuento(85) . "€ <br>";
