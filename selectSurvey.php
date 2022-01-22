<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
</head>

<body>

<?php
    session_start();
    include "connectToDb.php";
    include "menu.php";
    include "filters.php";

       
        $query2 = "SELECT * FROM courses WHERE tutorID='$_SESSION[ID]'";
        $results2 = $conn->query($query2);

        if (isset($_POST['send'])) {

            $cID = $_POST['courseID'];
          
            $query2 = "UPDATE selectedcourses
            SET survey = 1
            WHERE courseID='$cID'";

            $result = $conn->query($query2);
            
        }
?>

    <div class="box">
        <h2>Select A Course To Send A Survey</h2><br>
        <form name="signup" action="" method="post" onsubmit="return validateSignup()">
        Choose Course <select name="courseID" > 

        <?php

        while ($row2 = $results2->fetch_array(MYSQLI_ASSOC)) { 

     
        ?>
            <option value= <?php echo $row2["courseID"]?>>  <?php echo $row2["courseName"]?> </option>
        <br><br>
        <?php } ?>

        <input type='submit' class="btn btn-primary" name="send">


        </select>
        </form>

    </div>
 
</body>

</html>