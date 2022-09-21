<?php
$course = $_GET["num"];

$conexion = mysqli_connect("localhost","root","","infobdn");
if($conexion == false){
    mysqli_connect_errno();
}
else{
    $sql = "DELETE FROM courses WHERE code=$course";
    $consulta = mysqli_query($conexion, $sql);
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=view-courses.php'> ";
}

?>