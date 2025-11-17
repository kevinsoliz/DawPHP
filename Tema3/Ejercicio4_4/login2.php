<?php
session_start();
include('conexion.php');

if ($_POST) {
    
    $nombre = $_POST["usuario"];
    $password = $_POST["pass"];
    $rol = $_POST["rol"];

  // Comprobamos que los campos no estén vacíos.
        if (empty($nombre) || empty($password) || empty($rol)){
                                               
            $_SESSION['error_message'] = 'Campos vacíos';
            header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión  
            exit(); // Es crucial llamar a exit()
        }
        
        else if (is_numeric($nombre) || !is_numeric($password)) {

            $_SESSION['error_message'] = 'Campos inválidos';
            header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión  
            exit(); // Es crucial llamar a exit()
        } 


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

                    else {

                        $_SESSION['error_message'] = 'Usuario, contraseña o rol incorrectos.';
                        
                        // Autenticación fallida 
                
                        header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión 
                
                        exit(); // Es crucial llamar a exit()
                    }
                }
                
            } catch (PDOException $e){ // Aunque el profesor no esté en esa tabla no lanza error.
                
                echo $e->getMessage();
                
            }
   
    }
}


