

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<h3 class="bg-success p-2 text-dark bg-opacity-10"> Add Materials </h3>

  <form action="" method="post" name="edit" enctype="multipart/form-data">
CourseID : <input type = 'text'  name= "courseID"  >

<br><br>
 <input type = 'file' name='path' id="formFile" class="form-control" >
<br>
 <input type = 'submit' class="btn btn-primary" name="upload">

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
    
        $sql = "INSERT INTO materials (courseID,materialPath) VALUES ('$cID','$target_file')";
       // $sql="INSERT INTO materials (file_name, type, size) VALUES('$final_file', '$file_type','$new_size')";
           mysqli_query($conn,$sql);
             

}

    move_uploaded_file($tmp_name, "$target_dir/$name");
 
}

?>

<!-- <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->
</html>
