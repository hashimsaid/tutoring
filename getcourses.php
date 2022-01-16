<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>




<style>
    body {
        background-image: url("pictures/website/backgroundPattern.png");
    }

    .warning {
        color: red;
        text-align: center;
        font-weight: bold;
    }

    .box {
        box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
        margin: auto;
        margin-top: 5%;
        margin-bottom: 5%;
        padding: 50px;
        top: 10%;
        background-color: white;
        width: 40%;
        text-align: center;

    }
</style>


<?php

session_start();
include "menu.php";
include "connectToDb.php";
include "filters.php";


//variables gotten
if (isset($_POST['submit'])) {
    $cName = $_POST['courseName'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $notapproved = 0;

    $path = $_FILES['path'];
    $target_dir = "";
    $target_file = $target_dir . basename($_FILES['path']['name']);
    $tmp_name = $_FILES['path']['tmp_name'];
    $name = basename($_FILES['path']['name']);
    if ($_FILES['path']['size'] == 0 && $_FILES['path']['error'] == 0) {
    } else {
        $sql = "INSERT INTO courses (courseName,price,description,picture,approved) 
        VALUES ('$cName','$price','$desc','$target_file','$notapproved')";

        if (mysqli_query($conn, $sql)) {
            //echo "success";
        } else {
           // echo "fail";
        }
    }

    move_uploaded_file($tmp_name, "pictures/courses/$name");
}

?>
<form method='post' enctype="multipart/form-data" class="box">

    <div class="mx-auto" style="width:25% ;">
        Course Name : <input type='text' name="courseName" class="form-control">

        Price : <input type='text' name='price' class="form-control">

        Description : <input type='text' name='desc' class="form-control">

        Picture <input type='file' name='path' class="form-control">
        <br>
        <input type='submit' name='submit' class="btn btn-primary ">
    </div>
</form>


</html>