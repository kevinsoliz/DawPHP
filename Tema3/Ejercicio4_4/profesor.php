<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['usuario'])) { ?>


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
        <h1>Esta es la web del profesor</h1>
        <h2>Bienvenida <?php echo $_SESSION['usuario']; ?></h2>

        <table>
            <tr>
                <th colspan="4">Listado de Alumnos</th>
            </tr>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Rol</th>
            </tr>
        
            <?php
            $stmt = $conn->prepare("SELECT * FROM alumno");
            $stmt->execute();
            $alumno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alumno as $usuario){
                echo "
                <tr>
                <td> " . $usuario['usuario'] .
                "<td>" . $usuario['password'] .
                "<td>" . $usuario['rol'] .
                "</tr> ";
            }
            ?>
        </table>
        <br>
        <a href="logout.php">Volver</a>
    </body>
    </html>

<?php }
else {
    header('Location: index.php');
} ?>


