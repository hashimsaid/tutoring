<?php
session_start();
include "connectToDb.php";

$sql = "SELECT * FROM courses WHERE courseName LIKE '%" . $_POST['search'] . "%'";
$result = $conn->query($sql) or die(mysqli_error($conn));
$cols  = $result->num_rows;
if ($cols < 1) {
    echo '<div class="warning">No results found</div>';
} else { ?>
    <div class="mx-auto" style="width: 75%;">
        <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <div class="mb-5 row g-0 bg-light position-relative" style="box-shadow: 10px 10px rgba(0, 0, 0, 0.5);">
                <div class="col-md-4 mb-md-4 p-md-4">
                    <img src="pictures/courses/<?php echo $row["picture"] ?>" class="w-100">
                </div>
                <div class="col-md-6 p-4 ps-md-0">
                    <h2><?php echo $row["courseName"] ?></h2>
                    <p><?php echo $row["description"] ?></p>
                    <div dir="rtl">
                        <h4><b>Price <?php echo $row["price"] ?></h4>
                        <?php
                            if (!empty($_SESSION['ID'])) {
                                echo '<button onclick="clicked(this);" class="btn btn-primary" id=' . $row["courseID"] . '>Add to cart</button>';
                            }
                            ?></div>
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

                            xhttp.open("GET", "addToCart.php?courseID=" + cID, true);
                            xhttp.send();
                        }
                    </script>
                </div>
            </div>
    <?php
        }
    }

    ?>
    <style>
        .warning {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>