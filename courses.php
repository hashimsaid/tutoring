<html>
<header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body {
            background-image: url("pictures/website/backgroundPattern.png");
        }
    </style>

</header>

<?php
session_start();
include "connectToDb.php";
include "menu.php";
$query = "SELECT * FROM courses";
$results = $conn->query($query);
?>

<div class="p-2 pt-3 mb-4" style="background-color: #f0f0f0 ">
    <input style="border:none;width: 35%;" type="text" class="form-control d-flex mx-auto" name="Name_Search" id="Name_Search" placeholder="Search courses...">
</div>

<div id="result">
    <body>

        <div class="mx-auto" style="width: 75%;">

            <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) { ?>
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
                                $query = "SELECT * from cart where courseID='$row[courseID]' AND learnerID='$_SESSION[ID]' ";
                                $result = mysqli_query($conn,$query);

                                $query2 = "SELECT * from selectedCourses where courseID='$row[courseID]' AND learnerID='$_SESSION[ID]' ";
                                $result2 = mysqli_query($conn,$query2);

                                if(mysqli_num_rows($result) > 0)
                                {
                                    echo '<button class="btn btn-primary" disabled>Already in cart</button>';
                                }else if(mysqli_num_rows($result2) > 0){
                                    echo '<button class="btn btn-primary" disabled>Already Enrolled</button>';
                                }
                                else{
                                echo '<button onclick="clicked(this);" class="btn btn-primary" id=' . $row["courseID"] . '>Add to cart</button>';
                                }
                            }
                            ?>

                        </div>
                        <script>
                            function clicked(button) {
                                button.disabled = true;
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState==4 && this.status == 200) {
                                        button.innerHTML = this.responseText;
                                    }
                                };
                                var cID = button.id;

                                xhttp.open("GET", "addToCart.php?courseID=" + cID, true);
                                xhttp.send();
                            }
                        </script>
                    </div>
                </div>

            <?php } ?>


        </div>
</div>


</body>

<script>
    $(document).ready(function() {
        $('#Name_Search').keyup(function() {
            var txt = $(this).val()

            $.ajax({
                url: "searchCourses.php",
                method: "post",
                data: {
                    search: txt
                },
                dataType: "text",
                success: function(data) {
                    $('#result').html(data);
                }
            })

        })
    })
</script>

</html>