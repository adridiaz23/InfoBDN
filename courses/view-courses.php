<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View courses</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class = "grid-container">
        <div class="header">
            <?php headerPrincipal(true); ?>
            <div id="sesion"> 
                <h1>Ver Cursos</h1>
            </div>
        </div>
        <div class="menu1">menu izq</div>
        <div class="nav">buscad</div>
        <div class="menu2">menu dere</div>
        <div class="content">
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
        <div class = "admin-items"><a href="create-courses.php">Crear cursos </a> </div>
        <div class = "admin-items"><a href="../admin.php">Admin Home</a> </div>
        </div>
        <div class="footer">pie</div>  
    </div>
    
    
</body>
</html>