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

.container {
  display: block;
  position: relative;
  padding-left: 15px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
}
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 14px;
  width: 14px;
  background-color: #fff;
  border-radius: 50%;
}
.container:hover input ~ .checkmark {
  background-color: #ccc;
}
.container input:checked ~ .checkmark {
  background-color: lightgreen;
}
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
</header>

<?php
session_start();
include "connectToDb.php";
include "menu.php";
$query = "SELECT DISTINCT orderID,total,learnerID FROM orders";
$results = mysqli_query($conn, $query);
?>
<div class="pt-4 mx-auto mb-4" style="background-color: #f0f0f2 ">
    <input style="border:none;width: 35%;" type="text" class="form-control mx-auto d-flex" name="Name_Search" id="Name_Search" placeholder="Search orders...">
    
    <div class="d-flex mx-auto"style="width:27%">
    <label class="container">by Order ID
  <input type="radio" id = "orderID" checked="checked" name="radio">
  <span class="checkmark"></span>
</label>
<label class="container">by Amount
  <input type="radio" id = "amount" name="radio">
  <span class="checkmark"></span>
</label>
<label class="container">by Learner Name
  <input type="radio" id = "learnerName" name="radio">
  <span class="checkmark"></span>
</label>
</div>
</div>


<div id="result">
    <body>
        <div class="mx-auto" style="width: 75%;">
            <?php 
            if (mysqli_num_rows($results) > 0) {
            while ($row = $results->fetch_array(MYSQLI_ASSOC)) { 
                
                $orderID = $row["orderID"];
                $sql = "SELECT DISTINCT courseID FROM  orders WHERE orderID = '$orderID'";
                $result = $conn->query($sql);
                $coursesCount = 0;
                while ($index = $result->fetch_array(MYSQLI_ASSOC)) { 
                    $coursesCount++;
                }
                
                $learnerID = $row["learnerID"];

                $namesSQL = "SELECT Fname,Lname FROM learners WHERE learnerID = '$learnerID' ";
                $namesResult = $conn->query($namesSQL);
               
                $firstName = "NoName";
                $lastName = "NoName";
                while ($i = $namesResult->fetch_array(MYSQLI_ASSOC)) { 
                   $firstName = $i["Fname"];
                   $lastName = $i["Lname"];
                }
                ?>
                <div class="p-2 row  bg-light position-relative" style="box-shadow: 10px 10px rgba(0, 0, 0, 0.5);">
                    <div class=" p-4 ">
                        <h2>Order ID : <?php echo $row["orderID"]?></h2>
                        <h4>Courses Count : <?php echo $coursesCount?></h4>
                        <br><Br><br>
                        <h5>Ordered By : <?php echo $firstName." ".$lastName?></h5>
                        <div class="d-flex flex-row-reverse">
                        <h5>Total : <?php echo $row["total"]?></h5>
                        </div> 
                </div>

            <?php } } 
            else{
                echo "There is No Orders To view";
            }?>


        </div>
</div>
</body>
<script>

        function isNumeric(num){
        return !isNaN(num)
        }

    $(document).ready(function() {
        
        $('#Name_Search').keyup(function() {
            var txt = $(this).val()

            if (document.getElementById('orderID').checked) {
                $.ajax({
                url: "searchOrders.php",
                method: "post",
                data: {
                    search: txt,
                    type: "id"
                },
                dataType: "text",
                success: function(data) {
                    $('#result').html(data);
                }
            })
                }
                else if(document.getElementById('amount').checked){
                    $.ajax({
                url: "searchOrders.php",
                method: "post",
                data: {
                    search: txt,
                    type: "amount"
                },
                dataType: "text",
                success: function(data) {
                    $('#result').html(data);
                }
            })  
                }
                else if(document.getElementById('learnerName').checked){
                    txt = txt.split(" ").join("");
                    $.ajax({
                url: "searchOrders.php",
                method: "post",
                data: {
                    search: txt,
                    type: "learnerName"
                },
                dataType: "text",
                success: function(data) {
                    $('#result').html(data);
                }
            })
                }
            

        })
    })
</script>
</html>