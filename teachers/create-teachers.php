<?php include("../funciones.php")?>
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
    if ($_POST){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $passwd = $_POST['passwd'];
        $title = $_POST['title'];

        if (is_uploaded_file ($_FILES['photo']['tmp_name'])){
            $nombreDirectorio = "img/";
            $idUnico = time();
            $nombreFichero = $idUnico . "-" .
            $_FILES['imagen']['name'];
            move_uploaded_file ($_FILES['photo']['tmp_name'],
            $nombreDirectorio . $nombreFichero);
        }
        else{
            print ("No se ha podido subir el fichero\n");
        }
        $conexion = conectar();
        if($conexion == false){
            mysqli_connect_errno();
        }else{
            $sql = "INSERT INTO teachers (id,name,surname,passwd,title,photo) VALUES (NULL,'$name','$surname','$passwd','$title','$photo')";
            
            $consulta = mysqli_query($conexion, $sql);
            mysqli_close($conexion);
        }

    }else{
        formCreateTeacher();
    }
?>
</body>
</html>