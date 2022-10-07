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
        $dni = $_POST['dni'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $passwd = $_POST['passwd'];
        $title = $_POST['title'];
        
        if (is_uploaded_file ($_FILES['photo']['tmp_name'])){
            $nombreDirectorio = "img/";
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $_FILES['photo']['name'];
            $directorio = $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['photo']['tmp_name'], $nombreDirectorio . $nombreFichero);
            $tamaño = $_FILES["photo"]["size"];
            $tipo = $_FILES["photo"]["type"];
        }

        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        /*if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/> - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
            ?>
            <!-- <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=create-teachers.php"/> -->
            <?php 
            
        }   
        else{*/
            $conexion = conectar();
            if($conexion == false){
                mysqli_connect_errno();
            }else{
                $sql = "INSERT INTO teachers (id,dni,name,surname,passwd,title,photo) VALUES (NULL,'$dni','$name','$surname','$passwd','$title','$directorio ')";
                
                $consulta = mysqli_query($conexion, $sql);
                mysqli_close($conexion);
            }
        //}
        
    }   
    else{
            formCreateTeacher();
        }
?>
</body>
</html>