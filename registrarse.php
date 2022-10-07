<?php include("funciones.php");//session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
<?php
if($_POST){
    //registrar en base de datos
    $dni = $_POST['dni'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $passwd = $_POST['passwd'];
    $bornDate = $_POST['bornDate'];
    
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
        $sql = "SELECT * FROM students WHERE dni = '$dni'";
        $consulta = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($consulta)>0){
            print("Este correo electronico ya esta registrado.");
            ?>
            <!--  <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/Practica08 php/Indice.php"/> -->
            <?php 
                        
        }else{
            //Si el correo no está registrado, hacemos un insert de los datos introducidos a la base de datos
            $sql = "INSERT INTO students (id.dni,name,surname, passwd,bornDate,photo) VALUES (NULL,'$dni','$name','$surname','$passwd','$bornDate','$directorio ')";
            //Controlamos que se guarde correctamente.
            if (mysqli_query($conexion, $sql)) {
                    echo "Nuevo Usuario registrado";
            } else {
                mysqli_connect_errno();
            }
            //y al terminar el registro redirigimos a la página del menú del portal.
            
            //echo <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/Practica08 php/Portal.php"/>
            
            }
        mysqli_close($conexion);
    }

    //redirigir a pagina de iniciada la sesion
}else{
    ?>
    <form name="formulariRegistro" method="POST" action="#" enctype="multipart/form-data" >
        <label for="dni">dni:   </label >
            <input type="text"  name="dni" maxlength="9" id = "dni" required/><br>
        <label for="name">name:   </label >
            <input type="text"  name="name" maxlength="15" id = "name" required/><br>
        <label for="surname"> surname:   </label >
            <input type="text"  name="surname" maxlength="15" id = "surname" required/><br>
        <label for="passwd"> Password: </label >
            <input type="password"  maxlength="30" id = "passwd" name="passwd" required /><br>
        <label for="bornDate"> born date: </label >
            <input type="date"  maxlength="30" id = "bornDate" name="bornDate" required /><br>
        <label for="photo"> photo:</label >
            <input type="file"  name="photo" id = "photo" required/><br>
        <input type="submit" name="subir" value="Aceptar"/>
    </form>
    <?php
}
?>    
</body>
</html>