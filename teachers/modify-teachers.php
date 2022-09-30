<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify courses</title>
</head>
<body>
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
        
</body>
</html>