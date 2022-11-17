<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <title>Modify courses</title>
</head>
<body>
<div class = "grid-container">
            <div class="header">
                <?php headerPrincipal(true); ?>
                <div id="sesion"> 
                    <h1>Cursos Disponibles </h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </h1>
                    <div class = "salir-item"><a href="../salir.php">Salir</a> </div>
                </div>
            </div>
            <div class="menu1"></div>
            <div class="nav"></div>
            <div class="menu2"></div>
            <div class="content">
    <?php
        if($_POST){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $passwd = $_POST['passwd'];
            $title = $_POST['title'];
            //$photo = $_POST['photo'];
            $teacher = $_POST['teacher'];

            $conexion = conectar();

            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $sql = "UPDATE teachers SET name ='$name', surname = '$surname', passwd= '$passwd', title= '$title' WHERE id = '$teacher'";
                $consulta = mysqli_query($conexion, $sql);
                if ($consulta== false){
                    mysqli_error($conexion); 
                }
                else{
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=view-teachers.php'> ";
                }
            }
        }
        else{//dibujamos el modificar
            $teacherID = $_GET["num"];

            $conexion = conectar();
    
            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $sql = "SELECT * FROM teachers WHERE id =$teacherID ";
                $consulta = mysqli_query($conexion, $sql);
                $teacher = mysqli_fetch_array($consulta);
                if ($consulta== false){
                    mysqli_error($conexion); 
                }
                else{
                    formModifyTeacher($teacher);
                }
            }
        }
        ?>
                <div class = "admin-items"><a href="courses/mis-cursos-student.php">Mis cursos </a> </div>
            </div>
            <div class="footer"></div>  
        </div>     
        
</body>
</html>