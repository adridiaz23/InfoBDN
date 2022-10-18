<?php 
session_start();
include("funciones.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>
<body>
<?php
if ($_POST){
    $dni = $_POST['dni'];
    $passwd = $_POST['passwd'];
    
    //Realizamos la conexión a la bbdd 
    $conexion = conectar();

    //Comprobamos que se ha realizado bien.
    if($conexion == false){
        mysqli_connect_errno();
    }
    //Si la conexión es correcto ejecutamos esta parte de código
    else{

        //En la siguente consulta comprobamos los datos introducidos en la bbdd.
        $sql = "SELECT * FROM students WHERE dni = '$dni' AND passwd = '$passwd'";
        $consulta = mysqli_query($conexion, $sql);

       //si son correctos ejecuta esta parte de código
        if(mysqli_num_rows($consulta)>0){
            $type = 'Student';
            createSesion($consulta,$type,$conexion);
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=interfaz-student.php'/>";
            
        }
        else{
            $sql = "SELECT * FROM teachers WHERE dni = '$dni' AND passwd = '$passwd'";
            $consulta = mysqli_query($conexion, $sql); 
            if(mysqli_num_rows($consulta)>0){
                $type = 'Teacher';
                createSesion($consulta,$type,$conexion);
                echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=interfaz-teachers.php'/>";
            }
            else{
                $sql = "SELECT * FROM admins WHERE dni = '$dni' AND passwd = '$passwd'";
                $consulta = mysqli_query($conexion, $sql);
                    
                if(mysqli_num_rows($consulta)>0){
                    $type = 'Admin';
                    createSesion($consulta,$type,$conexion);
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=admin.php'/>";
                }else{//Si no querrá decir que uno de los campos es erróneo y nos redirigirá a la página de login otra vez
                    print("Contraseña o dni  erróneos");
                    mysqli_close($conexion);
                    //echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=login.php'/>"; 
                
                }
            }
            
        }
    }
}
        
        
        //mysqli_close($conexion);
    else{//dibujamo form
    ?>
    <div class = "container">
        <form name="formulariLogin" method="POST" action="#" >
            <label for="dni">
                dni:   
            </label >
                <input type="text"  name="dni" maxlength="9" id = "dni" required/><br>
            <label for="Password">
                Password:
            </label >
                <input type="password"  maxlength="30" id = "passwd" name="passwd" required /><br>
            <input type="submit" name="subir" value="Aceptar"/>
        </form>
    </div>
    <?php
}
?>
</body>
</html>