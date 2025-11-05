<?php
include_once 'guarda_prefs.php';

if($_COOKIE['colorusu']){
    $colorusu = $_COOKIE['colorusu'];
    $nombreusu = $_COOKIE['nombreusu'];

    setcookie("colorusu", false, time()-300);
    setcookie("nombreusu", false, time()-300);

    header("Location: index.php");
}
else {
    echo "No tienes preferencias guardadas.";
}