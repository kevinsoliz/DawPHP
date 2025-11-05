<?php
include_once "guarda_prefs.php";

if(isset($_COOKIE['colorusu'])){
    $colorusu = $_COOKIE['colorusu'];
    $nombreusu = $_COOKIE['nombreusu'];
    echo "
        <style>
            body {
                background-color: $colorusu;
            }
        </style>
    ";
    echo "<h1>Bienvenido $nombreusu</h1>";
    echo "<a href='preferencias.php'>Preferencias</a> <br><br>";
    echo "<a href='borrar_prefs.php'>Borrar Preferencias</a>";
}
else {
    echo "<h1>Página de inicio</h1>";
    echo "<a href='preferencias.php'>Preferencias</a>";
}