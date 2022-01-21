<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background-image: url("pictures/website/backgroundPattern.png");
    }

    .itemCard:hover {
      background-color: rgb(240, 240, 240);
    }
  </style>

</head>

<?php
session_start();
include "connectToDb.php";
include "menu.php";

$TutorID = $_SESSION["ID"];
$query = "SELECT courses.courseID,courses.courseName,courses.description,courses.picture FROM courses WHERE tutorID='" . $TutorID . "' ";
$results = $conn->query($query);
?>

<body>

  <br><br><br>
  <div class="card-columns col justify-content-center mx-auto" style="width:90%;">
    <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) { ?>

      <div class="card itemCard"  style="width:500px; height:400px; box-shadow: 10px 10px rgba(0, 0, 0, 0.5);">
        <div class="card-body text-center">
          <img class="card-img-top" src="pictures/courses/<?php echo $row["picture"] ?>">
          <h4 class="pt-2"><b><?php echo $row["courseName"] ?></b></h4>
          <button onclick="clicked(this);" class="btn btn-primary" id=<?php echo $row["courseID"] ?>>send survey</button>
        </div>
      </div>
    <?php } ?>

  </div>
  </div>


</body>

<script>
                            function clicked(button) {
                                button.disabled = true;
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.status == 200) {
                                        button.innerHTML = "sent";
                                    }
                                };
                                var cID = button.id;

                                xhttp.open("GET", "addToCart.php?courseID=" + cID, true);
                                xhttp.send();
                            }
</script>

</html>