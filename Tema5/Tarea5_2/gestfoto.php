<?php
session_start();
include_once 'conexion.php';

if($_POST) {

    $consulta = $_POST['consulta'];
    $titulo = $_POST['titulo'];
    $tematica = $_POST['tematica'];
    $size = $_POST['size'];

    try {
        switch($consulta) {

            case 'insertar':
                // Comprobamos que los campos no estén vacíos.
                if (empty($titulo) || empty($tematica) || empty($size)){
                                                
                  echo 'Rellene los campos requeridos para insertar nuevo.';
                    header('refresh:3 url=fotografo.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()

                }

                else {
                    $consulta = "INSERT INTO fotos (titulo, tematica, size) VALUES ( :titulo, :tematica, :size)";

                    $sql = $conn->prepare($consulta);
                    $sql->bindParam(":titulo", $titulo);
                    $sql->bindParam(":tematica", $tematica);
                    $sql->bindParam(":size", $size);
                        
                    $sql->execute();
                        
                    if ($sql->rowCount() > 0) {
                        header('Location: fotografo.php');
                        exit();
                    }
                    else {
                        echo "La inserción no se ha podido realizar.";
                        header('refresh:3 url=fotografo.php');
                        exit();
                    }
                }    
                break;

            case 'modificar':
                // Comprobamos que los campos no estén vacíos.
                 if (empty($titulo) || empty($tematica) || empty($size)){
                                                
                  echo 'Inserta los campos requeridos.';
                    header('refresh:3 url=fotografo.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()

                }
               
                else {
                      $consulta = "UPDATE fotos SET titulo = :titulo, tematica = :tematica, size = :size WHERE titulo = :titulo";

                        $sql = $conn->prepare($consulta);
                        $sql->bindParam(":titulo", $titulo);
                        $sql->bindParam(":tematica", $tematica);
                        $sql->bindParam(":size", $size);
                            
                        $sql->execute();
                            
                        if ($sql->rowCount() > 0) {
                            header('Location: fotografo.php');
                            exit();
                        }
                        else {
                            echo "La actualización no ha podido llevarse a cabo.";
                            header('refresh:3 url=fotografo.php');
                            exit();
                        }   
                }

                break;
            case 'eliminar':
                // Comprobamos que los campos no estén vacíos.
                if (empty($titulo) || !empty($tematica) || !empty($size)){
                                                    
                    echo 'Solo se requiere el campo de nombre';
                    header('refresh:3 url=fotografo.php'); // Redirigir de vuelta al formulario de inicio de sesión  
                    exit(); // Es crucial llamar a exit()
                }
            

                else {
                      $consulta = "DELETE FROM fotos WHERE titulo = :titulo";

                        $sql = $conn->prepare($consulta);
                        $sql->bindParam(":titulo", $titulo);
                       
                            
                        $sql->execute();
                            
                        if ($sql->rowCount() > 0) {
                            header('Location: fotografo.php');
                            exit();
                        }
                        else {
                           echo "La eliminación no ha podido realizarse.";
                            header('refresh:3 url=fotografo.php');
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

