<?php
session_start();
include 'conexion.php';
include 'funciones.php';

if ($_POST) {

    $usuario = $_POST["usuario"];
    $password = $_POST['password'];



    // Comprobamos que los campos no estén vacíos.
    if (empty($usuario) || empty($password)) {

        $_SESSION['error_message'] = 'Campos vacíos';
        header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión  
        exit(); // Es crucial llamar a exit()
    } else {

        $_SESSION['usuario'] = $usuario;

        try {

            $consulta = "SELECT * from alumnos WHERE usuario = :usuario AND password = :password";

            $sql = $conn->prepare($consulta);
            $sql->bindParam(":usuario", $usuario);
            $sql->bindParam(":password", $password);

            var_dump($usuario);
            var_dump($password);

            $sql->execute();
            

            if ($sql->rowCount() > 0) {

                $consulta = "SELECT usuario from alumnos";
                $sql = $conn->prepare($consulta);
                $sql->execute();

                $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['datos'] = crearDatosAlumno($usuarios);
                $_SESSION['votado'] = false;

                header('Location: alumno.php');
                exit();
            } else {
                $_SESSION['error_message'] = $usuario;

                // Autenticación fallida 
                header('Location: index.php'); // Redirigir de vuelta al formulario de inicio de sesión 
                exit(); // Es crucial llamar a exit()
            }
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
}
