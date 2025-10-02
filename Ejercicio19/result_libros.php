<?php

   if(isset($_POST)){
        $textoBusqueda = $_POST["TextoBusqueda"];
        $buscarEn = $_POST["BuscarEn"];
        $tipoLibro = $_POST["TipoLibro"];
        echo "<h2>Resultados del formulario de búsqueda</h2>";
        echo "<p>Estos son los datos introducidos:</p>";
        echo "<ul>
                <li>$textoBusqueda</li>
                <li>$buscarEn</li>
                <li>$tipoLibro</li>
            </ul>";
    }
    
