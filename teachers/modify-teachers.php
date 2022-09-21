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
            $photo = $_POST['photo'];
            
            $teacher = $_POST['teacher'];

            $conexion = mysqli_connect("localhost","root","","infobdn");

            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $sql = "UPDATE teachers SET name ='$name', surname = '$surname', passwd= '$passwd', title= '$title', photo= '$photo' WHERE id = '$teacher'";
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

            $conexion = mysqli_connect("localhost","root","","infobdn");
    
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
                    ?>
                    <h2>Modify Teacher</h2>
                    <form name="UpdateTeacher" method="POST" action="#" >
                            <label for="name"> name:</label >
                                <input type="text"  name="name" maxlength="10" id = "name" required value="<?php echo $teacher[1] ?>"/><br>
                            
                            <label for="surname"> surname:</label >
                                <input type="text"  name="surname" maxlength="15" id = "surname" required value="<?php echo $teacher[2] ?>"/><br>
                            
                            <label for="passwd"> passwd:</label >
                                <input type="password"  name="passwd" maxlength="30" id = "passwd" required value="<?php echo $teacher[3] ?>"/><br>
                        
                            <label for="title"> title:</label >
                                <input type="text"  name="title" maxlength="15" id = "title" required value="<?php echo $teacher[4] ?>"/><br>
                    
                            <label for="photo"> photo:</label >
                                <input type="text"  name="photo" maxlength="250" id = "photo" required value="<?php echo $teacher[5] ?>"/><br>
                            <input type="submit" name="update" value="update"/>        
                            <input type="hidden" name= "teacher" value="<?php echo $teacher[0] ?>">
                    </form>
                <?php
                }
            }
        }
        ?>        
        
</body>
</html>