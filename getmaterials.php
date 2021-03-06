<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<style>
  body {
    background-image: url("pictures/website/backgroundPattern.png");
  }

  .box {
    box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
    margin: auto;
    margin-top: 5%;
    margin-bottom: 5%;
    padding: 50px;
    top: 10%;
    background-color: white;
    width: 60%;
    text-align: center;
  }
</style>

<?php

session_start();
include "connectToDb.php";
include "menu.php";
include "filters.php";

$query2 = "SELECT * FROM courses WHERE tutorID='$_SESSION[ID]'";
$results2 = $conn->query($query2);

if (isset($_POST['upload'])) {
  $cID = $_POST['courseID'];
  $path = $_FILES['path'];
  $target_dir = "materials/";
  $target_file = $target_dir . basename($_FILES['path']['name']);
  $tmp_name = $_FILES['path']['tmp_name'];
  $name = basename($_FILES['path']['name']);
  if ($_FILES['path']['size'] == 0 && $_FILES['path']['error'] == 0) {
  } else {

    $sql = "INSERT INTO materials (courseID,materialPath) VALUES ('$cID','$target_file')";

    mysqli_query($conn, $sql);
  }

  move_uploaded_file($tmp_name, "$target_dir/$name");
}

?>

<form action="" method="post" name="edit" enctype="multipart/form-data" class="box">

  <div class="mx-auto" style="width:25% ;">
    <h3> Add Materials </h3>
    <br>
    Choose Course <select name="courseID" > 
<?php

 while ($row2 = $results2->fetch_array(MYSQLI_ASSOC)) { ?>
  <option value= <?php echo $row2["courseID"]?>>  <?php echo $row2["courseName"]?> </option>
  <br><br>
  <?php } ?>

</select>


    <br>
      <input type='file' name='path' id="formFile">
    <br>


    <input type='submit' class="btn btn-primary" name="upload">


  </div>
</form>

</html>
