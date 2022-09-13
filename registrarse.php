<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <form name="formulariRegistro" method="POST" action="#" >
        <label for="CompteDeMail">
            Compte de mail:   
        </label >
            <input type="email"  name="CompteDeMail" maxlength="30" id = "CompteDeMail" required/><br>
        <label for="Nom">
            Nom:   
        </label >
            <input type="text"  name="Nom" maxlength="15" id = "Nom" required/><br>
        <label for="Password">
            Password:
        </label >
            <input type="password"  maxlength="30" id = "Password" name="Password" required /><br>
        <input type="submit" name="subir" value="Aceptar"/>
    </form>
<?php
    //registrar en base de datos
    $email = $_POST['CompteDeMail'];
    $pass = $_POST['Password'];
    $Nom = $_POST['Nom'];

    $conexion = mysqli_connect("localhost","root","","infobdn");
    if($conexion == false){
        mysqli_connect_errno();
    }
    
    else{
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $consulta = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($consulta)>0){
            print("Este correo electronico ya esta registrado.");
            ?>
              <!--  <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/Practica08 php/Indice.php"/> -->
            <?php 
                        
        }else{
            //Si el correo no está registrado, hacemos un insert de los datos introducidos a la base de datos
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$Nom', '$email', '$pass')";
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
    

?>

    
</body>
</html>