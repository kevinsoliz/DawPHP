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
    <h1>Esta es la web del estudiante</h1>
    <h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>
    <form action="procesar-voto.php" method="post">    
    <table>
        <tr>
            <th colspan="4">Listado de Alumnos</th>
        </tr>
        <tr>
            <th>Alumno</th>
            <th>Votos</th>
        </tr>
    
        
            <?php

                $consulta = "SELECT usuario from alumnos";

                $sql = $conn->prepare($consulta);
                
            
            $sql->execute();
            $alumno = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alumno as $usuario){
                echo "
                <tr>
                    <td> 
                        <label for='alumno'>" . $usuario['usuario'] . "</label>
                        <input type='radio' name='alumno' id='alumno' value='". $usuario['usuario'] . "' >
                    </td>
                    <td>" . $_SESSION['votos'] ."</td>

                </tr> ";
            }
            ?>
    </table>
    <br>
    <button type="submit">Votar</button>
    </form>
    <br>
    <form action="logout.php" method="post">
        <button type="submit">Volver</button> 
    </form>
</body>
</html>