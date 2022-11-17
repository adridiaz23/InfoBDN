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
                    <div class = "../salir-item"><a href="salir.php">Salir</a> </div>
                </div>
            </div>
            <div class="menu1"></div>
            <div class="nav"></div>
            <div class="menu2"></div>
            <div class="content">
    <?php
        if($_POST){
            $code = $_POST['code'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $hours = $_POST['hours'];
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];

            $conexion = conectar();

            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $sql = "UPDATE courses SET name ='$name', description = '$description', hours= '$hours', startdate= '$startdate' , enddate = '$enddate' WHERE code = '$code'";
                $consulta = mysqli_query($conexion, $sql);
                if ($consulta== false){
                    mysqli_error($conexion); 
                }
                else{
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=view-courses.php'> ";
                }
            }
        }
        else{//dibujamos el modificar
            $idCourse = $_GET["num"];

            $conexion = conectar();
    
            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $sql = "SELECT * FROM courses WHERE code =$idCourse ";
                $consulta = mysqli_query($conexion, $sql);
                $course = mysqli_fetch_array($consulta);
                 if ($consulta== false){
                        mysqli_error($conexion); 
                    }
                    else{
                        //dibujar tabla
                        //viewCourses($consulta);?>
                        <form name="UpdateTeacher" method="POST" action="#" >
                        <label for="name"> name:</label >
                            <input type="text"  name="name" maxlength="10" id = "name" required value="<?php echo $course[1] ?>"/><br>
                                            
                        <label for="description"> description:</label >
                            <input type="text"  name="description" maxlength="15" id = "sudescriptionrname" required value="<?php echo $course[2] ?>"/><br>
                                            
                        <label for="hours"> hours:</label >
                            <input type="number"  name="hours" maxlength="30" id = "hours" required value="<?php echo $course[3] ?>"/><br>
                                        
                        <label for="startdate"> start date:</label >
                            <input type="date"  name="startdate" maxlength="15" id = "startdate" required value="<?php echo $course[4] ?>"/><br>
                        <label for="enddate"> end date:</label >
                            <input type="date"  name="enddate" maxlength="15" id = "enddate" required value="<?php echo $course[4] ?>"/><br>
                       <br>
                            <input type="submit" name="update" value="update"/>        
                            <input type="hidden" name= "code" value="<?php echo $course[0] ?>">
                                    </form>
                                    <?php
                    }
            }
        }
        ?>
                <div class = "admin-items"><a href="view-courses.php">Mis cursos </a> </div>
            </div>
            <div class="footer"></div>  
        </div>     
        
</body>
</html>