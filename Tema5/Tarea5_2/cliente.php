<?php 
session_start();
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
            table, tr, th, td{
                border: 1px solid grey; 
                border-collapse: collapse;
                padding: 5px 10px;
            }

            tr:nth-child(even) {
                background: #dff0ec; 
            }
        </style>
</head>
<body>
    <h1>Esta es la web del cliente</h1>
    <h2>Hola <?php echo $_SESSION['usuario']; ?></h2>

    <table>
        <tr>
            <th colspan="4">Fotos</th>
        </tr>
        <tr>
            <th>Título</th>
            <th>Temática</th>
            <th>Size</th>
        </tr>
        
            <?php

                $consulta = "SELECT titulo, tematica, size FROM fotos WHERE size > 300";
                $sql = $conn->prepare($consulta);
            
            
            $sql->execute();
            $fotos = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($fotos as $foto){
                echo "
                <tr>
                <td> " . $foto['titulo'] .
                "<td>" . $foto['tematica'] .
                "<td colspan='2'>" . $foto['size'] .
                "</tr> ";
            }
            ?>
    </table>
    <br>
    <form action="logout.php" method="post">
        <button type="submit">Volver</button>
    </form>
    
</body>
</html>