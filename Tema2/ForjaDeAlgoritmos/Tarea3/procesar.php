<?php

include_once "funciones.php";
if($_POST){
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $rarezaMinima = $_POST['rareza'];
    $inventario = [];
    $inventario_filtrado = [];

    try {
        
        if(empty($nombre) || empty($rarezaMinima))
            throw new Exception ("Rellena el formulario.");

        else if(is_numeric($nombre) || !is_numeric($cantidad))
            throw new Exception ("Los valores son inválidos.");

        else {
                //Agregamos items de ejemplo:

                $inventario = agregarItem($inventario, "Lechugas", 4, "común");
                $inventario = agregarItem($inventario, "Magdalenas", 30, "raro");
                $inventario = agregarItem($inventario, "Sandías", 2, "épico");
                $inventario = agregarItem($inventario, $nombre, $cantidad, "raro");
                
                //Bucle filtrado:
                foreach($inventario as $id => $item){
                    $valorRareza = obtenerRarezaValor($item['rareza']); //Obtenemos la rareza de cada item llamando a nuestra función.
            
                    if($valorRareza >= $rarezaMinima){ //Condición mayor igual que la rareza mínima introducida por el usuario.
                        $inventario_filtrado[$id] = $item; //reciclamos el valor del id de inventario y simplemente asignamos el item completo.
                    }
            
                }

                //Presentación final: 
                echo "<link
                        rel='stylesheet'
                        href='https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css'
                        />
                        <style>
                            table {
                                width: 70vw;
                                padding: 10px;
                                border: 1px solid grey;
                            }
                        </style>";

                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Rareza</th>
                    </tr>";
                
                //Bucle de presantación
                foreach($inventario_filtrado as $id => $item){
                    echo "<tr>
                            <td>$id</td>
                            <td>" . $item['nombre'] . "</td>
                            <td>" . $item['cantidad'] . "</td>
                            <td>" . $item['rareza'] . "</td>
                        </tr>";
                }
                
                echo "</table>";
            
            
            }
        

    } catch (Exception $e){
        echo "<p style='font-weight: bold; color: red;'> Error: " . htmlspecialchars($e -> getMessage()) . "</p>";
        header("refresh: 3 url=formulario.php");
    }

}