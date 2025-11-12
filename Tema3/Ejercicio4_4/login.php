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
            
                $consulta = "SELECT * from personal WHERE usuario=:nombre AND password=:pass AND rol=:rol";

                $sql = $conn->prepare($consulta);
                $sql->bindParam(":nombre", $nombre);
                $sql->bindParam(":pass", $password);
                $sql->bindParam(":rol", $rol);
            
                $sql->execute();
            
            } catch (PDOException $e){
            
                echo $e->getMessage();
            
            }
            
            if ($sql->rowCount() > 0) {
            
                switch ($rol) {
                    case 'profesor': 
                        header('Location: profesor.php');
                        break;
                    case 'delegado':
                        header ('Location: delegado.php');
                        break;
                    case 'estudiante':
                        header ('Location: student.php');
                        break;
                    default:
                        echo 'No forma parte del personal del instituto';
                }
            
            } else { 
                // Autenticación fallida 
                $_SESSION['error_message'] = 'Usuario o contraseña incorrectos.';


                header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión 

                exit(); // Es crucial llamar a exit()
            
            }
        }

    } catch (Exception $e) {

        echo "<p style='color: red; font-weight: bold;'>Error: " . htmlspecialchars($e -> getMessage()) . "</p>";
        header ("refresh: 3 url=index.php");
    }

}

