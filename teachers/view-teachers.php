<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View teachers</title>
</head>
<body>
    <?php
    $conexion = conectar();

    if($conexion == false){
        mysqli_connect_errno();
    }
    else{
        $sql = "SELECT * FROM teachers ";
        $consulta = mysqli_query($conexion, $sql);

        if ($consulta== false){
            mysqli_error($conexion); 
        }
        else{
            viewTeachers($consulta);
        }
    }
    ?>
</body>
</html>