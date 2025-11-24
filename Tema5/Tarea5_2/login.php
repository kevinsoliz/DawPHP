<?php
session_start();
include('conexion.php');

if ($_POST) {
    
    $nombre = $_POST["usuario"];

  // Comprobamos que los campos no estén vacíos.
        if (empty($nombre)){
                                               
            $_SESSION['error_message'] = 'Campos vacíos';
            header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión  
            exit(); // Es crucial llamar a exit()
        }

        else {

            $_SESSION['usuario'] = $nombre;

            try {

                    $consulta = "SELECT * from cliente WHERE nombre=:nombre";

                        $sql = $conn->prepare($consulta);
                        $sql->bindParam(":nombre", $nombre);
                    
                        $sql->execute();

                        if ($sql->rowCount() > 0) {
                            header ('Location: cliente.php');
                            exit();
                        }

                        else { 

                            $consulta = "SELECT * from fotografo WHERE nombre=:nombre";

                            $sql = $conn->prepare($consulta);
                            $sql->bindParam(":nombre", $nombre);
                        
                            $sql->execute();

                                
                            if ($sql->rowCount() > 0) {

                                header('Location: fotografo.php');
                                exit();
                            } 

                            else {

                                $_SESSION['error_message'] = 'Usuario incorrecto.';
                                
                                // Autenticación fallida 
                                header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión 
                                exit(); // Es crucial llamar a exit()
                            }

                        }   
                
            } catch (PDOException $e){ 

                echo $e->getMessage();
                
            }
   
    }
}


