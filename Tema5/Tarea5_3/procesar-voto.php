<?php
session_start();
include_once 'conexion.php';
include 'funciones.php';



if($_POST) {
    $delegado = $_POST['alumno'];
    
   foreach ($_SESSION['alumnos'] as $alumno){
          echo $alumno['usuario'];        
    }
            
   // un array para los alumnos y otro para los votos
   // pero para poder ordenarlo, no puedo iterar sobre el array que obtengo de la base de datos, 
   // los datos de la base de datos deberia guardarlos en otro array con el que pueda trabajar.         
   

       
    
   

}
