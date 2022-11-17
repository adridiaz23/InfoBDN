<?php include("../funciones.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teacher</title>
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
                <h1>Crear Teachers</h1>
                <div class = "salir-item"><a href="../salir.php">Salir</a> </div>
            </div>
        </div>
        <div class="menu1"></div>
            <div class="nav"></div>
            <div class="menu2"></div>
        <div class="content">
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
            <div class = "admin-items"><a href="view-teachers.php">Ver Profesores </a> </div>
            <div class = "admin-items"><a href="../admin.php">Admin Home </a> </div>
        </div>
        <div class="footer"></div>  
    </div>
    
</body>
</html>