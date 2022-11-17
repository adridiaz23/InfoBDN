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
<?php
include("../funciones.php");
session_start();
?>    
        <div class = "grid-container">
            <div class="header">
                <?php headerPrincipal(true); ?>
                <div id="sesion"> 
                    <h1>Poner Nota</h1>
                    <div class = "salir-item"><a href="salir.php">Salir</a> </div>
                </div>
            </div>
            <div class="menu1"></div>
            <div class="nav"></div>
            <div class="menu2"></div>
            <div class="content">
<?php
if ($_SESSION['type']=='Teacher' ){
    
    $idCurso = $_GET['num'];
    $conexion = conectar();
    
    $sql = "SELECT * FROM marks WHERE courses_code = '$idCurso'" ;
    $consulta = mysqli_query($conexion, $sql);

    if ($consulta== false){
        mysqli_error($conexion); 
    }
    else{
        if($_POST){
            $nota = $_POST['mark'];

            $sql = "UPDATE marks  SET mark ='$nota' WHERE courses_code = '$idCurso'";
            $consulta = mysqli_query($conexion, $sql);
            if ($consulta== false){
                mysqli_error($conexion); 
            }
            else{
                //echo $sql;
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../interfaz-teachers.php'> ";
            }
        }else{
            $numlinies = mysqli_num_rows($consulta);
            echo"<table>";
                echo "<tr>";
                echo"<th>Code Course</th>";
                echo"<th>Student Id</th>";
                echo "<th>Mark</th>";
                echo "</tr>";
                for ($i =0 ; $i < $numlinies ; $i++){
                    $linea = mysqli_fetch_array($consulta);
                    echo "<tr>";
                    echo "<td>".$linea[0]."</td>";
                    echo "<td>".$linea[1]."</td>";
                    /*if($linea[2]==0){
                        echo "<td><a href='../teachers/put-mark.php?num= ".$linea[0]."'>Poner nota</a></td>";
                    }*/
                    ?> <form name="UpdateTeacher" method="POST" action="#" >
                        <td><input type="number"  name="mark" maxlength="10" id = "mark" required>
                        <input type="submit" name="nota" value="asignar nota"/>
                        </td>
                        </form
                    <?php
                    echo"</tr>";
                }
                echo "</tr>";
                echo"</table>"; 
        }
        
        
    }


}else{
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=login.php'/>";
}
?>
    <div class ="admin-items"><a href="../interfaz-teachers.php">Ver mis cursos</a> </div>
            </div>
            <div class="footer"></div>  
        </div>


</body>
</html>