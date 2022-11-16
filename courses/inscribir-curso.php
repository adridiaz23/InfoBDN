<?php
include("../funciones.php");
session_start();
if($_SESSION['type']=='Student'){
    if ($_GET["num"]){
        $idCourse = $_GET["num"];
        $idStudent = $_SESSION['dni'];
       //echo ()

        $conexion = conectar();
        if($conexion == false){
            mysqli_connect_errno();
        }else{

            $sql = "INSERT INTO marks (courses_code, student_id, mark) VALUES('$idCourse','$idStudent',0) ";
            echo ($sql);
            $consulta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../interfaz-student.php'> ";
        }
    }
}