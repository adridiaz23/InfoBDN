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
                <div class = "salir-item"><a href="../salir.php">Salir</a> </div>
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
                    viewCourses($consulta);
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