<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teacher</title>
</head>
<body>
<?php
    if (!empty($_POST['CreateTeacher'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $passwd = $_POST['passwd'];
        $title = $_POST['title'];
        $photo = $_POST['photo'];

        $conexion = mysqli_connect("localhost","root","","infobdn");
        if($conexion == false){
            mysqli_connect_errno();
        }else{
            $sql = "INSERT INTO teachers (id,name,surname,passwd,title,photo) VALUES (NULL,'$name','$surname','$passwd','$title','$photo')";
            $consulta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
        }

    }else{
        ?>
        <h2>Create Teacher</h2>
        <form name="CreateTeacher" method="POST" action="#" >
                <label for="name"> name:</label >
                    <input type="text"  name="name" maxlength="10" id = "name" required/><br>
                
                <label for="surname"> surname:</label >
                    <input type="text"  name="surname" maxlength="15" id = "surname" required/><br>
                
                <label for="passwd"> passwd:</label >
                    <input type="password"  name="passwd" maxlength="30" id = "passwd" required/><br>
            
                <label for="title"> title:</label >
                    <input type="text"  name="title" maxlength="15" id = "title" required/><br>
        
                <label for="photo"> photo:</label >
                    <input type="text"  name="photo" maxlength="250" id = "photo" required/><br>
                 <input type="submit" name="create" value="create"/>
                    
        </form>
<?php
    }
?>
</body>
</html>