<?php include("../funciones.php");
session_start();?>
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
<?php if ($_SESSION['type']=='Student'){
?>    
    <div class = "grid-container">
        <div class="header">
            <?php headerPrincipal(true); ?>
            <div id="sesion"> 
                <h1>Mis Cursos</h1>
                <div class = "salir-item"><a href="../salir.php">Salir</a> </div>
            </div>
        </div>
        <div class="menu1"></div>
            <div class="nav"></div>
            <div class="menu2"></div>
        <div class="content">
        <?php
            $conexion = conectar();

            if($conexion == false){
                mysqli_connect_errno();
            }
            else{
                $idStudent = $_SESSION['dni'];

                $sql = "SELECT * FROM courses WHERE code IN (SELECT courses_code FROM marks WHERE student_id = '$idStudent')  ";
                /*$sql = "SELECT C.code, C.name, C.description, C.hours, C.startDate, C.endDate, C.teacherID , M.mark 
                        FROM courses AS C JOIN marks AS ON (C.code = M.courses_code) 
                        WHERE M.student_id = '$idStudent'";*/
                $consulta = mysqli_query($conexion, $sql);
                //echo $sql;

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
                        echo "<td><a href='baja-curso.php?num= ".$linea[0]."'>Desmatricularme</a></td>";
                        echo"</tr>";
                    }
                    echo "</tr>";
                    echo"</table>"; 
                
                }
            }
        ?>
            <div class = "admin-items"><a href="../interfaz-student.php">Cursos Disponibles </a> </div>
        </div>
        <div class="footer"></div>  
    </div>
    
    <?php
    }else{
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../login.php'/>";

    }
    ?>
</body>
</html>