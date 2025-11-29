<?php
session_start();
include_once 'conexion.php';

if($_POST) {

    $consulta = $_POST['consulta'];
    $nombre = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    try {
        switch($consulta) {

            case 'insertar':
                // Comprobamos que los campos no estén vacíos.
                if (empty($nombre) || empty($password) || empty($rol)){
                                                
                  echo 'Inserta los campos requeridos.';
                    header('refresh:3 url=profesor.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()

                }
            
                else if (is_numeric($nombre) || !is_numeric($password)) {
                    echo 'Campos inválidos';
                    header('refresh:3 url=profesor.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()
             
                } 


                else {
                    $consulta = "INSERT INTO personal (usuario, password, rol) VALUES ( :nombre, :pass, :rol)";

                    $sql = $conn->prepare($consulta);
                    $sql->bindParam(":nombre", $nombre);
                    $sql->bindParam(":pass", $password);
                    $sql->bindParam(":rol", $rol);
                        
                    $sql->execute();
                        
                    if ($sql->rowCount() > 0) {
                        header('Location: profesor.php');
                        exit();
                    }
                    else {
                        echo "La inserción no se ha podido realizar.";
                        header('refresh:3 url=profesor.php');
                        exit();
                    }
                }    
                break;

            case 'modificar':
                // Comprobamos que los campos no estén vacíos.
                if (empty($nombre) || empty($password) || empty($rol)){
                                                    
                    echo 'Inserta los campos requeridos';
                    header('refresh:3 url=profesor.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()
                }
                
                else if (is_numeric($nombre) || !is_numeric($password)) {

                    echo 'Campos inválidos';
                    header('refresh:3 url=profesor.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()
                } 


                else {
                      $consulta = "UPDATE personal SET usuario = :nombre, password = :pass, rol = :rol WHERE usuario = :nombre";

                        $sql = $conn->prepare($consulta);
                        $sql->bindParam(":nombre", $nombre);
                        $sql->bindParam(":pass", $password);
                        $sql->bindParam(":rol", $rol);
                            
                        $sql->execute();
                            
                        if ($sql->rowCount() > 0) {
                            header('Location: profesor.php');
                            exit();
                        }
                        else {
                            echo "La actualización no ha podido llevarse a cabo.";
                            header('refresh:3 url=profesor.php');
                            exit();
                        }   
                }

                break;
            case 'eliminar':
                // Comprobamos que los campos no estén vacíos.
                if (empty($nombre) || !empty($password) || !empty($rol)){
                                                    
                    echo 'Solo se requiere el campo de nombre';
                    header('refresh:3 url=profesor.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()
                }
                
                else if (is_numeric($nombre)){

                    echo 'Campo inválido';
                     header('refresh:3 url=profesor.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()
                } 


                else {
                      $consulta = "DELETE FROM personal WHERE usuario = :nombre";

                        $sql = $conn->prepare($consulta);
                        $sql->bindParam(":nombre", $nombre);
                       
                            
                        $sql->execute();
                            
                        if ($sql->rowCount() > 0) {
                            header('Location: profesor.php');
                            exit();
                        }
                        else {
                           echo "La eliminación no ha podido realizarse.";
                            header('refresh:3 url=profesor.php');
                            exit();
                        }   
                }

                break;

            case 'volver':
                session_destroy();
                header ('Location: index.php');
                exit();
                
                break;
        }
    }    
    catch(PDOException $e){
        echo "<br>" . $e->getMessage();

    }
}

