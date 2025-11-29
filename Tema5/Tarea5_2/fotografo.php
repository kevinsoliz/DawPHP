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
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css"> -->
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
        <h1>Esta es la web del Fotógrafo</h1>
        <h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>

    <form action="gestfoto.php" method='post'>
        <table>
            <tr>
                <th colspan="4"><label>Gestión de fotos</label></th>
            </tr>

                <tr>
                    <td>
                        <label>Título</label>
                    </td>
                    <td>
                        <input type="text" maxlength="50" name="titulo">
                    </td>
                    <td>
                        <label>Temática</label>
                    </td>
                    <td>
                        <input type="text"  maxlength="50" name="tematica">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Size</label>
                    </td>
                    <td>
                        <input type="text" maxlength="50" name="size">
                    </td>
                </tr>

                <tr>
                    <td colspan="4" align="center">
                        <button type='submit'name='consulta' value='volver'>Volver</button>
                        <button type='submit' name='consulta'  value='insertar'>Nuevo</button>
                        <button type='submit' name='consulta' value='modificar'>Modificar</button>
                        <button type='submit'name='consulta' value='eliminar'>Eliminar</button>
                
                    </td>
                </tr>
            <tr>
                <th colspan="4">Listado de fotos</th>
            </tr>
            <tr>
                <th>Título</th>
                <th>Temática</th>
                <th colspan='2'>Size</th>
            </tr>
        
            <?php
            $stmt = $conn->prepare("SELECT titulo, tematica, size FROM fotos");
            $stmt->execute();
            $fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    </form>
       
    </body>
    </html>

<?php }
else {
    header('Location: index.php');
} ?>
