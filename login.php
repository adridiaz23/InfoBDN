<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form name="formulariLogin" method="POST" action="#" >
        <label for="CompteDeMail">
            Compte de mail:   
        </label >
            <input type="email"  name="CompteDeMail" maxlength="30" id = "CompteDeMail" required/><br>
        <label for="Password">
            Password:
        </label >
            <input type="password"  maxlength="30" id = "Password" name="Password" required /><br>
        <input type="submit" name="subir" value="Aceptar"/>
</form>
    <?php
    $email = $_POST['CompteDeMail'];
    $pass = $_POST['Password'];
    
    //Realizamos la conexión a la bbdd 
    $conexion = mysqli_connect("localhost","root","","infobdn");

    //Comprobamos que se ha realizado bien.
    if($conexion == false){
        mysqli_connect_errno();
    }
    //Si la conexión es correcto ejecutamos esta parte de código
    else{

        //En la siguente consulta comprobamos los datos introducidos en la bbdd.
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$pass'";
        $consulta = mysqli_query($conexion, $sql);

       //si son correctos ejecuta esta parte de código
        if(mysqli_num_rows($consulta)>0){
            ?>
                <META HTTP-EQUIV="REFRESH" CONT ENT="2;URL=http://localhost/InfoBDN/InfoBDN/sesion.php"/>
            <?php
       //Si no querrá decir que uno de los campos es erróneo y nos redirigirá a la página de login otra vez
        }else{
            print("Contraseña o correo electrónico erróneos");
        ?>
           <!-- <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=http://localhost/Practica08 php/Indice.php"/> -->
        <?php
        
        }
        mysqli_close($conexion);;
    }   

    ?>

</body>
</html>