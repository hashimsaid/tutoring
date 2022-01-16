<html>
    <h3> Add Materials </h3>

  <form action="" method="post" name="edit" enctype="multipart/form-data">
CourseID : <input type = 'text'  name= "courseID" >
<br>
File : <input type = 'file' name='path'>

submit : <input type = 'submit' name="upload">

</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutoringdb";
$conn = new mysqli($servername, $username, $password, $dbname);

//$query = "INSERT INTO materials (courseID,materialPath) VALUES ('$cID','$path')";

if(isset($_POST['upload'])){
    $cID = $_POST['courseID'];

$path= $_FILES['path'];
$target_dir = "materials/";
$target_file = $target_dir . basename($_FILES['path']['name']);
$tmp_name = $_FILES['path']['tmp_name'];
$name = basename($_FILES['path']['name']);
if ($_FILES['path']['size'] == 0 && $_FILES['path']['error'] == 0) {


}
else{
    echo $target_file ;
    echo $name;
    echo $cID;
        $sql = "INSERT INTO materials (courseID,materialPath) VALUES ('$cID','$target_file')";
       // $sql="INSERT INTO materials (file_name, type, size) VALUES('$final_file', '$file_type','$new_size')";
           mysqli_query($conn,$sql);
             

}

    move_uploaded_file($tmp_name, "$target_dir/$name");
 
}
?>
</html>
