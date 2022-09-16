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
    if (!empty($_POST['CreateCourse'])){
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $hours = $_POST['hours'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $teacher_id = $_POST['teacher_id'];
    
        $conexion = mysqli_connect("localhost","root","","infobdn");
        if($conexion == false){
            mysqli_connect_errno();
        }else{
            $sql = "INSERT INTO courses (code,name,description,hours,start_date,end_date,teacher_id) VALUES (NULL,'$name','$description','$hours','$start_date','$end_date','$teacher_id')";
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
                <input type="text"  name="hours" maxlength="10" id = "hours" required/><br>
        
            <label for="start_date"> name:</label >
                <input type="text"  name="start_date" maxlength="10" id = "start_date" required/><br>
    
            <label for="end_date"> name:</label >
                <input type="text"  name="end_date" maxlength="10" id = "end_date" required/><br>

            <label for="teacher_id"> name:</label ><!-- Añadir un selec desplegable de todos los profes-->
                <input type="text"  name="teacher_id" maxlength="10" id = "teacher_id" required/><br> 
            <input type="submit" name="create" value="create"/>
        </form>
    <?php
    }?>
    
</body>
</html>