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
            width: 35%;
            text-align: center;
        }
</style>

<?php

session_start();
include "connectToDb.php";
include "menu.php";

if(isset($_POST['submit'])){

    $sql = "UPDATE messages SET comment='$_POST[comment]' WHERE id ='" . $_GET['id'] . "'";

    if ($conn->query($sql) === TRUE) {
        header("Location:auditorComments.php");
    } else {
        header("Location:addComment.php");
        echo "Error adding comment.";
    }

}

?>


<form action="" method="post" class="box">

    <h3> Add Comment </h3>
    <input type="text" name="comment">

    <input type='submit' class="btn btn-primary" name="submit" value="comment">
    
</form>