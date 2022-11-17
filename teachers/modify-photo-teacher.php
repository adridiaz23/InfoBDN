<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify photo</title>
</head>
<body> 
    <?php
    include("../funciones.php");
    if($_POST){
        if (is_uploaded_file ($_FILES['photo']['tmp_name'])){
            $nombreDirectorio = "img/";
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $_FILES['photo']['name'];
            $directorio = $nombreDirectorio . $nombreFichero;
            move_uploaded_file ($_FILES['photo']['tmp_name'], $nombreDirectorio . $nombreFichero);
            $tamaño = $_FILES["photo"]["size"];
            $tipo = $_FILES["photo"]["type"];
        }
        $conexion = conectar();

            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $sql = "UPDATE teachers SET photo='$directorio' WHERE id = '$teacher'";
                $consulta = mysqli_query($conexion, $sql);
                if ($consulta== false){
                    mysqli_error($conexion); 
                    }
                else{
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=view-teachers.php'> ";
                }
            }
    }else{
    $teacher = $_GET["num"];
    ?>
    <form name="updatePhoto" method="POST" action="#" enctype="multipart/form-data">
        <label for="photo">photo: </label>

            <input type="file"  name="photo" id = "photo" required/><br>
        <input type="submit" name="update" value="update"/>        
        <input type="hidden" name= "teacher" value="<?php echo $teacher ?>">
    </form>
<?php
    }
?>
    
    
</body>
</html>