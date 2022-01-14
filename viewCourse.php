<!DOCTYPE html>
<html>
    <header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</header>
<?php
session_start();
include "connectToDb.php";
include "menu.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM courses WHERE courseID='".$_GET["courseID"]."' ";
$results = $conn->query($query);
?>
<body>

<div class="mx-auto" style="width: 100%;">
    <?php while ($row = $results->fetch_array(MYSQLI_ASSOC)) {?> 
        <div class="p-5 d-flex " style=" background-color:DarkSlateGrey;">
            <img src="pictures/courses/<?php echo $row["picture"]?>" style="width:90%;">
            <div class="p-3">
            <h1 style="color:white;"><b><?php echo $row["courseName"]?> Course</b> </h1> 
            <p style="color:white; font-size:1.2em"> <?php echo $row["description"]?></p>
    </div>
    </div>
        <br><br><br>
        <div class=" p-5">
            <h1><b>Course Content</b> </h1> 

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <?php } ?>
    

    <div class="p-5">
        <?php 
        $query = "SELECT * FROM courses WHERE courseID='".$_GET["courseID"]."' ";
        $results = $conn->query($query);
        while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
            ?>
        <div class="p-5 border border-warning rounded"style="width:60%;" >
        <h2>Course Rating</h2>
<?php 
           $averageRating = round($row["averageRating"]);
           $counter = 0;
           while($counter<5){
            if($averageRating> $counter){
                ?>
                <span class="fa fa-star checked"></span>
                <?php
            }
            else{
                ?><span class="fa fa-star"></span>
                <?php
            }
            $counter=$counter+1;
           } 

        
        
?>
        <p><?php
         echo $row["averageRating"];
        }
        $query = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating IS NOT NULL AND review IS NOT NULL ";
        $average = $conn->query($query);


        $query1 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=1 ";
        $results1 = $conn->query($query1);
        $rating_1 = $results1->num_rows;

        $query2 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=2 ";
        $results2 = $conn->query($query2);
        $rating_2 = $results2->num_rows;

        $query3 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=3 ";
        $results3 = $conn->query($query3);
        $rating_3 = $results3->num_rows;

        $query4 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND  rating=4 ";
        $results4 = $conn->query($query4);
        $rating_4 = $results4->num_rows;

        $query5 = "SELECT * FROM selectedCourses WHERE courseID='".$_GET["courseID"]."' AND rating=5 ";
        $results5 = $conn->query($query5);
        $rating_5 = $results5->num_rows;

        $cols = $average->num_rows;
        if($cols === 0 ){
            $star5Percent=0;
            $star4Percent=0;
            $star3Percent=0;
            $star2Percent=0;
            $star1Percent=0;
        }
        else{
        $star5Percent = ($rating_5/$cols)*100;
        $star4Percent = ($rating_4/$cols)*100;
        $star3Percent = ($rating_3/$cols)*100;
        $star2Percent = ($rating_2/$cols)*100;
        $star1Percent = ($rating_1/$cols)*100;
        }
         ?> average rating based on <?php echo $cols;?> reviews.</p>

        <hr style="border:3px solid #f1f1f1">

        <div class="row">
        <div class="side">
            <div>5 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
            <div class="bar-5" style="width:<?php echo $star5Percent?>%;"></div>
            </div>
        </div>
        <div class="side right">
            <div><?php echo $rating_5;?></div>
        </div>
        <div class="side">
            <div>4 star </div>
        </div>
        <div class="middle">
            <div class="bar-container">
            <div class="bar-4" style="width:<?php echo $star4Percent?>%;"></div>
            </div>
        </div>
        <div class="side right">
            <div><?php echo $rating_4;?></div>
        </div>
        <div class="side">
            <div>3 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
            <div class="bar-3"style="width:<?php echo $star3Percent?>%;"></div>
            </div>
        </div>
        <div class="side right">
            <div><?php echo $rating_3;?></div>
        </div>
        <div class="side">
            <div>2 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
            <div class="bar-2" style="width:<?php echo $star2Percent?>%;"></div>
            </div>
        </div>
        <div class="side right">
            <div><?php echo $rating_2;?></div>
        </div>
        <div class="side">
            <div>1 star</div>
        </div>
        <div class="middle">
            <div class="bar-container">
            <div class="bar-1" style="width:<?php echo $star1Percent?>%;"></div>
            </div>
        </div>
        <div class="side right">
            <div><?php echo $rating_1;?></div>
        </div>
        </div>
        <hr class="m-5"style="height:0.7px;background-color:orange;">
        <h4>Write your Review</h4>
        <div class="d-flex">
        <h5 class="p-1 mx-2">Tap to rate </h5>
        <fieldset class="rating">
            <input type="radio" id="star5" name="rating" value="5" />
        <label class="full" for="star5"></label>
         <input type="radio" id="star4" name="rating" value="4" />
         <label class="full" for="star4"></label>
         <input type="radio" id="star3" name="rating" value="3" />
         <label class="full" for="star3"></label> 
          <input type="radio" id="star2" name="rating" value="2" />
          <label class="full" for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1" />
            <label class="full" for="star1"></label>
   </fieldset>
    </div>   
        <textarea class="form-control" id="reviewText"></textarea>
        <div class=" d-flex flex-row-reverse">
        <button onclick="clicked(this);" class="button rounded" id='<?php echo $_GET["courseID"]?>'>submit review</button>
    </div>

        <div>
    </div>
    
    <script>
        var sim = 0;
        var review = "";
        $("input[type='radio']").click(function(){
        sim = $("input[type='radio']:checked").val();
        }); 

        function snackBar1() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        x.innerHTML = "Tap on stars to rate";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }

        function snackBar2() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        x.innerHTML = "Please write a review";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }

    function clicked(button) {
        
        review = document.getElementById("reviewText").value;
            if(!review || review.length === 0){
                snackBar2();
            }
            else if(sim==0){
                snackBar1();
            }
            else{
                var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        var x = document.getElementById("displayReviews");
                        x.innerHTML=this.responseText;
                    };
                    var cID = button.id;
                    xhttp.open("GET", "reviewCourse.php?courseID="+cID+"&rating="+sim+"&review="+review);
                    xhttp.send();
                }
            }
        </script>
        <hr style="background-color:grey;">
        <h2 class="p-3">Reviews </h2>

        <div id="displayReviews">
        <?php
        $query = "SELECT learners.Fname,learners.Lname,rating,review,profilePicture  FROM selectedCourses INNER JOIN learners on selectedCourses.learnerID=learners.learnerID AND selectedCourses.courseID='".$_GET["courseID"]."' AND selectedCourses.rating IS NOT NULL";
        $results = $conn->query($query);
        $output = $results->num_rows;
        if($output===0){
            echo "<h5> No Reviews yet for this course</h5>";
        }
        while ($row = $results->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <div class="card"style="border:none;">
                <div class="d-flex">
            <img class="avatar" style="vertical-align: middle; width: 60px; height: 60px; border-radius: 50%;" src="pictures/profile/<?php echo $row["profilePicture"]?>"> 
        <div>
            <h5 class="pt-2 mx-2"><?php echo $row["Fname"]; echo "  ".$row["Lname"];?></h5>
        <div class="px-3 d-flex">
        <?php 
            $rating = $row["rating"];
           $count = 0;
           while($count<5){
            if($rating > $count){
                ?>
                <span class="fa fa-star checked"style="font-size: 18px;"></span>
                <?php
            }
            else{
                ?><span class="fa fa-star" style="font-size: 18px;"></span>
                <?php
            }
            $count=$count+1;
           } 
           ?>
        </div>
        </div>
        </div>
        <textarea readonly class="form-control m-2"style="overflow: hidden; background-color: #f9f9f9 outline: none; border:none;"> <?php echo $row["review"]?></textarea>
           <hr style="background-color:gold; height:2px">
           </div>
<?php
        }
        ?>
        </div>
        
        
    </div>
    <div id="snackbar" style="border-radius:10px"></div>
    <div id="snackbar" style="border-radius:10px"></div>
</body>

<style>
    
    @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);


.button{
  background-color: gold;
  border: none;
  color: black;
  padding: 8px 20px;
  text-decoration: none;
  margin: 10px;
  cursor: pointer;
}

.button:hover{
    color: white;
  background-color: black;
}

.rating>label {
    color: #ddd;
    float: right
}

.rating>[id^="star"]:checked~label,
.rating:not(:checked)>label:hover,
.rating:not(:checked)>label:hover~label {
    color: #FFD700
}

.rating>[id^="star"]:checked+label:hover,
.rating>[id^="star"]:checked~label:hover,
.rating>label:hover~[id^="star"]:checked~label,
.rating>[id^="star"]:checked~label:hover~label {
    color: #FFED85
}

.rating {
    border: none;
    margin-right: 49px
}


.rating>[id^="star"] {
    display: none
}

.rating>label:before {
    margin: 2px;
    font-size: 1.5em;
    font-family: FontAwesome;
    content: "\f005";
}

.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
    border-radius: 20px;
    margin-bottom: 5px
}
.fa {
  font-size: 25px;
}
.checked {
  color: Gold;
}
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

.right {
  text-align: right;
}

.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

.bar-5 {height: 18px; background-color: Gold;border-radius: 10px;}
.bar-4 {height: 18px; background-color: Gold;border-radius: 10px;}
.bar-3 {height: 18px; background-color: Gold;border-radius: 10px;}
.bar-2 {height: 18px; background-color: Gold;border-radius: 10px;}
.bar-1 {height: 18px; background-color: Gold;border-radius: 10px;}

#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 12px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
    </style>
</html>