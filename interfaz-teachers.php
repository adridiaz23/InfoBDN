<!DOCTYPE html>
<?php 
include("funciones.php"); 
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;700&display=swap" rel="stylesheet"> 
    <title>Teacher</title>
</head>
<body>
<div class = "grid-container">
        <div class="header">
            <?php headerPrincipal(false); ?>
            <div id="sesion"> 
                <h1>Teacher</h1>
                <div class = "salir-item"><a href="salir.php">Salir</a> </div>
            </div>
        </div>
        <div class="menu1">menu izq</div>
        <div class="nav">buscad</div>
        <div class="menu2">menu dere</div>
        <div class="content">
            <?php
                if($_SESSION['type']=='Teacher'){
                    $conexion = conectar();
                    if($conexion == false){
                        mysqli_connect_errno();
                    }
                    else{
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM courses WHERE teacherID = '$id' ";
                        $consulta = mysqli_query($conexion, $sql);
                        if ($consulta== false){
                            mysqli_error($conexion); 
                        }
                        else{
                            //dibujar tabla
                            viewCourses($consulta);
                        }
                    }




                }else{
                    echo("NO eres profesor");
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=login.php'/>";

                }
            ?>
        </div>
        <div class="footer">pie</div>  
</div>

    <!--<a href="courses/view-courses.php">Ver cursos</a>
    <a href="courses/create-courses.php">Crear cursos </a>
    <a href="courses/modify-courses.php"> Modificar cursos </a>

    <br>

    <a href="teachers/view-teachers.php">Ver profesores</a>
    <a href="teachers/create-teachers.php">Crear profesores </a>
    <a href="teachers/modify-teachers.php"> Modificar profesores </a> -->
</body>
</html>