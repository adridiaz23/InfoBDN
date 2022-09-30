<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
</head>
<body>
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
        <h2>Create course</h2>
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
    
</body>
</html>