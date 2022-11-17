<?php 
include("../funciones.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;700&display=swap" rel="stylesheet"> 
</head>
</head>
<body>
    <div class = "grid-container">
        <div class="header">
            <?php headerPrincipal(true); ?>
            <div id="sesion"> 
                <h1>Crear Cursos</h1>
                <div class = "../salir-item"><a href="../salir.php">Salir</a> </div>
            </div>
        </div>
        <div class="menu1"></div>
            <div class="nav"></div>
            <div class="menu2"></div>
        <div class="content">
            <?php
            if ($_POST){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $hours = $_POST['hours'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $teacherID = $_POST['teacherID'];
            
                $conexion = conectar();
                if($conexion == false){
                    mysqli_connect_errno();
                }else{

                    $sql = "INSERT INTO courses (code,name,description,hours,startDate,endDate,teacherID) VALUES (NULL,'$name','$description','$hours','$startDate','$endDate','$teacherID')";
                    $consulta = mysqli_query($conexion, $sql);
                    mysqli_close($conexion);
                }

            }else{
                //generamos el formulario de registro.  //pasar a funcion
            ?>
                <form name="CreateCourse" method="POST" action="#" >
                    <label for="name"> name:</label >
                        <input type="text"  name="name" maxlength="10" id = "name" required/><br>
                    
                    <label for="description"> description:</label >
                        <input type="text"  name="description" maxlength="10" id = "description" required/><br>
                    
                    <label for="hours"> hours:</label >
                        <input type="number"  name="hours"  id = "hours" required/><br>
                
                    <label for="startDate"> start_date:</label >
                        <input type="date"  name="startDate"  id = "startDate" required/><br>
            
                    <label for="endDate"> end_date:</label >
                        <input type="date"  name="endDate"  id = "endDate" required/><br>

                    <label for="teacherID"> teacher_id:</label ><!-- Añadir un selec desplegable de todos los profes-->
                        <select name = 'teacherID'>
                            <option value="0">Select one option</option>
                            <?php
                                $conexion = conectar();
                                if($conexion == false){
                                    mysqli_connect_errno();
                                }else{
                                    $sql = "SELECT name, id FROM teachers";
                                    $teachers = mysqli_query($conexion, $sql);
                                    $num_teachers = mysqli_num_rows($teachers);
                            
                                    
                                    for ($i=0; $i<$num_teachers; $i++){
                                        $teacher = mysqli_fetch_array($teachers);
                                        echo "<option value='".$teacher['id']."' >".$teacher["name"]."</option>";
                                    }
                                    
                                }
                            ?>
                        </select><br> 
                    <input type="submit" name="create" value="create"/>
                    
                </form>
            <?php
                    
            }?>
            <div class = "admin-items"><a href="view-courses.php">Ver cursos </a> </div>
            <div class = "admin-items"><a href="../admin.php">Admin Home </a> </div>
        </div>
        <div class="footer"></div>  
    </div>
    
    
    
</body>
</html>