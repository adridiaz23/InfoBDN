<?php
function conectar(){
    return mysqli_connect("localhost","root","","infobdn");
}

function viewTeachers($consulta){
    $numlinies = mysqli_num_rows($consulta);
            echo"<table>";
            echo "<tr>";
            echo"<th>id</th>";
            echo"<th>name</th>";
            echo "<th>surname</th>";
            echo "<th>title</th>";
            echo "<th>photo</th>";
            echo "<th>Modify</th>";
            echo "<th>Delete</th>";
            echo "</tr>";
            for ($i =0 ; $i < $numlinies ; $i++){
                $linea = mysqli_fetch_array($consulta);
            
                echo "<tr>";
                echo "<td>".$linea[0]."</td>";
                echo "<td>".$linea[1]."</td>";
                echo "<td>".$linea[2]."</td>";
                echo "<td>".$linea[4]."</td>";
                echo "<td>".$linea[5]."</td>";
                echo "<td><a href='modify-teachers.php?num= ".$linea[0]."'>Modify</a></td>";
                echo "<td><a href='delete-teachers.php?num= ".$linea[0]."'>Delete</a></td>";
                echo"</tr>";
            }
            echo "</tr>";
            echo"</table>"; 
}

function formModifyTeacher($teacher){
    ?>
    <h2>Modify Teacher</h2>
    <form name="UpdateTeacher" method="POST" action="#" >
        <label for="name"> name:</label >
            <input type="text"  name="name" maxlength="10" id = "name" required value="<?php echo $teacher[1] ?>"/><br>
                            
        <label for="surname"> surname:</label >
            <input type="text"  name="surname" maxlength="15" id = "surname" required value="<?php echo $teacher[2] ?>"/><br>
                            
        <label for="passwd"> passwd:</label >
            <input type="password"  name="passwd" maxlength="30" id = "passwd" required value="<?php echo $teacher[3] ?>"/><br>
                        
        <label for="title"> title:</label >
            <input type="text"  name="title" maxlength="15" id = "title" required value="<?php echo $teacher[4] ?>"/><br>
                    
        <label for="photo"> photo:</label >
        <a href="modify-photo-teacher.php?num= '<?php echo $teacher[0] ?>'"> MODIFICA</a><br>
            <input type="submit" name="update" value="update"/>        
            <input type="hidden" name= "teacher" value="<?php echo $teacher[0] ?>">
                    </form>
    <?php
}

function formCreateTeacher(){
    ?>
        <h2>Create Teacher</h2>
        <form name="CreateTeacher" method="POST" action="#" enctype="multipart/form-data" >
                <label for="name"> name:</label >
                    <input type="text"  name="name" maxlength="10" id = "name" required/><br>
                
                <label for="surname"> surname:</label >
                    <input type="text"  name="surname" maxlength="15" id = "surname" required/><br>
                
                <label for="passwd"> passwd:</label >
                    <input type="password"  name="passwd" maxlength="30" id = "passwd" required/><br>
            
                <label for="title"> title:</label >
                    <input type="text"  name="title" maxlength="15" id = "title" required/><br>
        
                <label for="photo"> photo:</label >
                    <input type="file"  name="photo" id = "photo" required/><br>
                 <input type="submit" name="create" value="create"/>
                    
        </form>
    <?php
}



?>