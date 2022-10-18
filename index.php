<!DOCTYPE html>
<?php 
include("funciones.php"); 
session_start();
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;700&display=swap" rel="stylesheet"> 
   <title>Index</title>
</head>
<body>
   <div class = "grid-container">
        <div class="header">
            <?php headerPrincipal(false); ?>
            <div id="sesion"> 
               <a href="login.php">Iniciar sesión</a>
               <a href="registrarse.php">Registrarse</a>
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
        </div>
        <div class="footer">pie</div>  
    </div>

</body>
</html>