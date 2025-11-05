<?php
if($_POST){
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];

    try {
        if(empty($nombre) || empty($color))
            throw new Exception ("Rellena los campos.");
        
        else if(is_numeric($nombre) || is_numeric($color))
            throw new Exception ("Los campos no pueden ser números");

        else {
            setcookie("nombreusu", $nombre, time()+300);
            setcookie("colorusu", $color, time()+300);
            
            header('Location: index.php');
        }
    }
    catch (Exception $e){
        echo "<p style='font-weight:bold; color:red;'>Error: " . htmlspecialchars($e -> getMessage()) . "</p>";
        header("refresh: 3 url=preferencias.php");
    }
}   