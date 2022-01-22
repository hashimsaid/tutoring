<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<style>

body {
      background-image: url("pictures/website/backgroundPattern.png");
    }
.box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin-top:30px;
            margin-left:auto;
            margin-right:auto;
            padding: 30px;
            top: 10%;
            background-color: white;
            width: 30%;
            height:80px;
        }
</style>

<body>
<?php
session_start();
include 'connectToDb.php';
include "menu.php";

$sql = "SELECT courses.courseName,selectedcourses.courseID FROM selectedCourses INNER JOIN courses ON courses.courseID=selectedCourses.courseID WHERE learnerID='$_SESSION[ID]' AND selectedCourses.survey=1 ";
$result = $conn->query($sql) or die(mysqli_error($conn));

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
?>
<div class="box p-3 d-flex justify-content-between">
    <h4 class="pt-1"><?php echo $row["courseName"];?></h4>
    <a class='btn btn-warning px-2 m-1' role="button" href="surveyCard.php?courseID=<?php echo $row["courseID"];?>" >View Survey</a>
</div>

<?php } ?>
 </body>