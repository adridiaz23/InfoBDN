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
    $conexion = mysqli_connect("localhost","root","","infobdn");

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
            //dibujar tabla
            $numlinies = mysqli_num_rows($consulta);
            echo"<table>";
            echo "<tr>";
            echo"<th>id</th>";
            echo"<th>name</th>";
            echo "<th>surname</th>";
            echo "<th>title</th>";
            echo "<th>photo</th>";
            echo "</tr>";
            for ($i =0 ; $i < $numlinies ; $i++){
                $linea = mysqli_fetch_array($consulta);
            
                echo "<tr>";
                echo "<td>".$linea[0]."</td>";
                echo "<td>".$linea[1]."</td>";
                echo "<td>".$linea[2]."</td>";
                echo "<td>".$linea[3]."</td>";
                echo "<td>".$linea[4]."</td>";
                echo"</tr>";
                
            }
            echo "</tr>";
            echo"</table>"; 
        }
    }
    ?>
</body>
</html>