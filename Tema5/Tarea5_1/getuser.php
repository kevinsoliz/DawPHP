<?php
session_start();
include_once 'conexion.php';

if(isset($_POST['grabardatos'])) {

    $nombre = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    try {

        $consulta = "INSERT INTO personal (usuario, password, rol) VALUES ( :nombre, :pass, :rol)";

        $sql = $conn->prepare($consulta);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":pass", $password);
        $sql->bindParam(":rol", $rol);
            
        $sql->execute();
            
        if ($sql->rowCount() > 0) {
            header('Location: profesor.php');
        }
        else {
            $_SESSION['error_message'] = 'Inserción fallida.';//refresh
        }
    } 
    catch(PDOException $e){
        echo "<br>" . $e->getMessage();

    }
}

if (isset($_POST['modificardatos'])) {
    $nombre = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    try {

        $consulta = "UPDATE personal SET usuario = :nombre, password = :pass, rol = :rol WHERE usuario = :nombre";

        $sql = $conn->prepare($consulta);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":pass", $password);
        $sql->bindParam(":rol", $rol);
            
        $sql->execute();
            
        if ($sql->rowCount() > 0) {
            header('Location: profesor.php');
        }
        else {
            $_SESSION['error_message'] = 'Modificación fallida.';
        }
    } 
    catch(PDOException $e){
        echo "<br>" . $e->getMessage();

    }
}


if (isset($_POST['eliminardatos'])) {
    $nombre = $_POST['usuario'];
    

    try {
        $consulta = "DELETE FROM personal WHERE usuario = :nombre";


        $sql = $conn->prepare($consulta);
        $sql->bindParam(":nombre", $nombre);
    
            
        $sql->execute();
            
        if ($sql->rowCount() > 0) {
            header('Location: profesor.php');
        }
        else {
            $_SESSION['error_message'] = 'No se ha podido borrar.';
        }
    } 
    catch(PDOException $e){
        echo "<br>" . $e->getMessage();

    }
}
