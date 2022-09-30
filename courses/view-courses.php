<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View courses</title>
</head>
<body>
    <?php
    $conexion = conectar();

    if($conexion == false){
        mysqli_connect_errno();
    }
    else{
        $sql = "SELECT * FROM courses ";
        $consulta = mysqli_query($conexion, $sql);

        if ($consulta== false){
            mysqli_error($conexion); 
        }
        else{
            //dibujar tabla
            $numlinies = mysqli_num_rows($consulta);
            echo"<table>";
            echo "<tr>";
            echo"<th>Code</th>";
            echo"<th>Name</th>";
            echo "<th>Description</th>";
            echo "<th>Hours</th>";
            echo "<th>Start Date</th>";
            echo "<th>End Date</th>";
            echo "<th>Teacher</th>";
            echo "</tr>";
            for ($i =0 ; $i < $numlinies ; $i++){
                $linea = mysqli_fetch_array($consulta);
            
                echo "<tr>";
                echo "<td>".$linea[0]."</td>";
                echo "<td>".$linea[1]."</td>";
                echo "<td>".$linea[2]."</td>";
                echo "<td>".$linea[3]."</td>";
                echo "<td>".$linea[4]."</td>";
                echo "<td>".$linea[5]."</td>";
                echo "<td>".$linea[6]."</td>";

                echo "<td><a href='modify-courses.php?num= ".$linea[0]."'>Modify</a></td>";
                echo "<td><a href='delete-course.php?num= ".$linea[0]."'>Delete</a></td>";
                echo"</tr>";
                
            }
            echo "</tr>";
            echo"</table>"; 
        }
    }
    ?>
</body>
</html>