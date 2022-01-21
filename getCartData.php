<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<?php
session_start();
include "connectToDb.php";

$conn = new mysqli($servername, $username, $password, $dbname);

$learnerID = $_SESSION["ID"];

$query = "SELECT courses.courseID,courses.courseName,courses.description,courses.picture,courses.price FROM cart INNER JOIN courses ON cart.courseID=courses.courseID AND learnerID='" . $learnerID . "' ";

$results = $conn->query($query);

$cols = $results->num_rows;

if ($cols < 1) {
?>
    <script>
    </script>
    <div class="mx-auto m-4" style="width: 75%;">
        <img src="pictures/utilities/emptycart.png" class="w-100">
        <style>
            body {
                background-image: none;
            }
        </style>
    </div>
    <?php
} else {
    $total = 0;
    while ($row = $results->fetch_array(MYSQLI_ASSOC)) { ?>
        <div class="mb-5 mt-5 row g-0 bg-light position-relative" style="box-shadow: 10px 10px rgba(0, 0, 0, 0.5);">
            <div class="col-md-4 mb-md-4 p-md-4">
                <img src="pictures/courses/<?php echo $row["picture"] ?>" class="w-100">
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <h2><?php echo $row["courseName"] ?></h2>
                <p><?php echo $row["description"] ?></p>

                <label style="font-size:140%;"><b><i>EGP <?php echo $row["price"];
                                                            $total += $row["price"];
                                                            ?></i></b></label>
                <div dir="rtl">
                    <button onclick="clicked(this);" class="btn btn-danger" id='<?php echo $row["courseID"] ?>'>Remove</button>
                </div>

                <script>
                    function clicked(button) {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.status == 200) {
                                button.innerHTML = "removed";
                                button.disabled = true;
                            }
                        };
                        var cID = button.id;
                        xhttp.open("GET", "removeFromCart.php?courseID=" + cID);
                        xhttp.send();
                    }
                </script>
            </div>
        </div>
        </div>

    <?php
    } ?>

    <div class="d-flex flex-row-reverse">
        <div>
            <h3>Total: <?php echo $total; ?> EGP </h3>
            <button onclick="checkOutClick(this);" class="checkbutton btn btn-lg btn-primary pt-2"><B>CheckOut</button>
            <br><br><br><br>
        </div>
    </div>
    <script>
        function checkOutClick(button) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.status == 200) {
                    button.innerHTML = this.responseText;
                }
            };
            var total = <?php echo $total; ?>;
            xhttp.open("GET", "placeOrder.php?total=" + total);
            xhttp.send();
        }
    </script>
    <style>
        .checkbutton {
            min-width: 250px;
            border-radius: 15px;
        }
    </style>
<?php
} ?>