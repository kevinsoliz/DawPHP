<?php
session_start();
include('conexion.php');

if ($_POST) {
    
    $nombre = $_POST["usuario"];
    $password = $_POST["pass"];
    $rol = $_POST["rol"];

    try {
        
        if (empty($nombre) || empty($password) || empty($rol))  // Comprobamos que los campos no estén vacíos.

            throw new Exception ("Rellena el formulario");
        
        else if (is_numeric($nombre) || !is_numeric($password)) 

            throw new Exception ("Campos inválidos");

        else {

            $_SESSION['usuario'] = $nombre;
            
            try {
            
                $consulta = "SELECT * from alumno WHERE usuario=:nombre AND password=:pass AND rol=:rol";

                $sql = $conn->prepare($consulta);
                $sql->bindParam(":nombre", $nombre);
                $sql->bindParam(":pass", $password);
                $sql->bindParam(":rol", $rol);
            
                $sql->execute();

                if ($sql->rowCount() > 0) {
                
                    switch ($rol) {
                        case 'delegado':
                            header ('Location: delegado.php');
                            break;
                        case 'estudiante':
                            header ('Location: student.php');
                            break;
                        default:
                            echo 'No forma parte del personal del instituto';
                    }
                            
                } 

                else { 
                    $consulta = "SELECT * from profesor WHERE usuario=:nombre AND password=:pass AND rol=:rol";

                    $sql = $conn->prepare($consulta);
                    $sql->bindParam(":nombre", $nombre);
                    $sql->bindParam(":pass", $password);
                    $sql->bindParam(":rol", $rol);
                
                    $sql->execute();

                        
                    if ($sql->rowCount() > 0) {
                
                        header('Location: profesor.php');
                    
                    } 
                }
                
            } catch (PDOException $e){ // Aunque el profesor no esté en esa tabla no lanza error.
                
                echo $e->getMessage();
                
            }


            
            $_SESSION['error_message'] = 'Usuario, contraseña o rol incorrectos.';
            
            // Autenticación fallida 
    
            header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión 
    
            exit(); // Es crucial llamar a exit()

           

    } catch (Exception $e) {

        echo "<p style='color: red; font-weight: bold;'>Error: " . htmlspecialchars($e -> getMessage()) . "</p>";
        header ("refresh: 3 url=index.php");
    }
    
    }
}


