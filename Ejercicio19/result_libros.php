<?php

   if(isset($_POST["buscar"])){
        $textoBusqueda = $_POST["TextoBusqueda"];
        $buscarEn = $_POST["BuscarEn"];
        $tipoLibro = $_POST["TipoLibro"];
        echo  $textoBusqueda . "<br>";
        echo  $buscarEn . "<br>";
        echo  $tipoLibro . "<br>";
    }
    
