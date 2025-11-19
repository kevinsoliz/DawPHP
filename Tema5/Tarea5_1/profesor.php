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
    <form action="getuser.php" method='post'>
        <table>
            <tr>
                <th colspan="4"><label>Gestión de usuarios</label></th>
            </tr>

                <tr>
                    <td><label>Usuario</label></td><td><input type="text" value="" maxlength="50" name="usuario"></td>
                    <td><label>Contraseña</label></td><td><input type="text" value="" maxlength="50" name="password"></td>
                </tr>
                <tr>
                    <td><label>Rol</label></td><td><input type="text" value="" maxlength="50" name="rol"></td>
                </tr>

                <tr><td colspan="4" align="center">

                    <button type='submit' name='insertar'>Insertar</button>
                    <button type='submit' name='modificar'>Modificar</button>
                    <button type='submit'name='eliminar'>Eliminar</button>
                    <button type='submit'name='volver'>Volver</button>
                
                    <!-- <input type="submit" value="volver" name="limpiardatos" >
                    <input type="submit" value="insertar" name="grabardatos" >
                    <input type="submit" value="modificar" name="modificardatos" >
                    <input type="submit" value="eliminar" name="eliminardatos"> -->
                
                </td>
                </tr>
            <tr>
                <th colspan="4">Listado de Alumnos</th>
            </tr>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th colspan='2'>Rol</th>
            </tr>
        
            <?php
            $stmt = $conn->prepare("SELECT * FROM personal");
            $stmt->execute();
            $alumno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alumno as $usuario){
                echo "
                <tr>
                <td> " . $usuario['usuario'] .
                "<td>" . $usuario['password'] .
                "<td colspan='2'>" . $usuario['rol'] .
                "</tr> ";
            }
            ?>

        </table>
    </form>
        
   <?php
    if (isset($_SESSION['error_message'])) {
        
        echo '<p style="color:red;">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']); // Limpia el mensaje de error después de mostrarlo
    }
    ?>
       
    </body>
    </html>

<?php }
else {
    header('Location: index.php');
} ?>


