<?php
include("../funciones.php");
session_start();
//if($_SESSION['type']=='Student'){
    if ($_GET["num"]){
        $idCourse = $_GET["num"];
        $idStudent = $_SESSION['dni'];
       //echo ()

        $conexion = conectar();
        if($conexion == false){
            mysqli_connect_errno();
        }else{

            $sql = "DELETE FROM marks WHERE courses_code = '$idCourse' AND student_id = '$idStudent'";
            //echo ($sql);
            $consulta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=mis-cursos-student.php'> ";
        }
    }
//}