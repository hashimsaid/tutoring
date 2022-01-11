<html>
    <header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    </header>

<?php
session_start();
include "connectToDb.php";
include "menu.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM courses";
$results = $conn->query($query);
?>
<h1> Available Courses  </h1>
<body>

<div class="mx-auto" style="width: 75%;">
    

    <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) {?> 
                <div class="mb-5 row g-0 bg-light position-relative">
            <div class="col-md-4 mb-md-4 p-md-4">
            <img src="pictures/courses/<?php echo $row["picture"]?>" class="w-100">
            </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h2><?php echo $row["courseName"]?></h2>
            <p><?php echo $row["description"]?></p>
            <div  dir="rtl" >
            <h4><b>Price <?php echo $row["price"]?></h4>
            <button onclick="clicked(this);" class="btn btn-primary" id='<?php echo $row["courseID"]?>'>Add to cart</button>
            </div>
            <script>
             function clicked(button) {
                    button.disabled = true;
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.status == 200) {
                            button.innerHTML = "Added";
                        }
                    };
                    var cID = button.id;

                    xhttp.open("GET", "addToCart.php?courseID="+cID, true);
                    xhttp.send();
                }
          </script>
        </div>
        </div>

    <?php } ?>
 


    </div>


</body>

</html>