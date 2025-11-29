<?php
session_start();
include 'conexion.php';
include 'funciones.php';
if (isset($_SESSION['usuario'])) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            table,
            tr,
            th,
            td {
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
                if (!isset($_SESSION['datos'])) {

                    $consulta = "SELECT usuario from alumnos";
                    $sql = $conn->prepare($consulta);
                    $sql->execute();
                    $_SESSION['alumnos'] = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    
                    foreach ($_SESSION['alumnos'] as $alumno) {
                        echo "
                        <tr>
                            <td> 
                                <label for='alumno'>" . $alumno['usuario'] . "</label>
                                <input type='radio' name='alumno' id='alumno' value='" . $alumno['alumno'] . "' >
                            </td>
                            <td>0</td>
        
                        </tr> ";
                    }
                    //Creo el array de datos con los que se van a trabajar
                    $_SESSION['datos'] = crearDatosAlumno($_SESSION['alumnos']);
                   
                }  
                else {
                    foreach ($_SESSION['datos'] as $clave => $valor) {
                        echo "
                        <tr>
                            <td> 
                                <label for='alumno'> $clave </label>
                                <input type='radio' name='alumno' id='alumno' value='$clave' >
                            </td>
                            <td>$valor</td>
        
                        </tr> ";
                    }
                }  

                ?>
            </table>
            <br>
            <button type="submit">Votar</button>
        </form>
        <br>
        <a href="logout.php">Volver</a>
        <p><?php echo $_SESSION['error']; ?> </p>
    </body>

    </html>

<?php } ?>