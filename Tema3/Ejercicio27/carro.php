<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <ul>
            <li><a href="?precio=35">Camiseta Element 35€</a></li>
            <li><a href="?precio=12.30">Libro Crimen y Castigo de F.D. 12.30€</a></li>
            <li><a href="?precio=499">Mesa Tarsele 499€</a></li>
            <li><a href="?precio=279">Móvil Balance Phone 279€</a></li>
        </ul>
        <a href="?vaciarCarro">Vaciar Carro</a>
        <br>
        
    </body>
</html>      
    
<?php

session_start();
if(isset($_REQUEST['precio'])){

   $_SESSION['precio'] = $_REQUEST['precio'];
   $_SESSION['total'] += $_SESSION['precio'];
   echo $_SESSION['total'] . ' €';

   
   
}

if(isset($_REQUEST['vaciarCarro'])){
    $_SESSION['total'] = 0;
    echo $_SESSION['total'] . ' €';
    
}
