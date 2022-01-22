<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
session_start();
include 'connectToDb.php';
include "menu.php";
?>
<body>

<div class="box" >
        <h4>Write your Review</h4>
                    
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
                   
                    <textarea class="form-control" id="reviewText"></textarea>
                    <div class=" d-flex flex-row-reverse">
                        <button onclick="clicked(this);" class="button rounded" id='<?php echo $_GET["courseID"]?>'>submit review</button>
                    </div>

</div>
        <div id="snackbar" style="border-radius:10px"></div>

        <script>
                        var sim = 0;
                        var review = "";
                        $("input[type='radio']").click(function() {
                            sim = $("input[type='radio']:checked").val();
                        });

                        function snackBar1() {
                            var x = document.getElementById("snackbar");
                            x.className = "show";
                            x.innerHTML = "Tap on stars to rate";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);
                        }

                        function snackBar2() {
                            var x = document.getElementById("snackbar");
                            x.className = "show";
                            x.innerHTML = "Please write a review";
                            setTimeout(function() {
                                x.className = x.className.replace("show", "");
                            }, 3000);
                        }

                        function clicked(button) {
                            review = document.getElementById("reviewText").value;
                            if (!review || review.length === 0) {
                                snackBar2();
                            } else if (sim == 0) {
                                snackBar1();
                            } else {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    window.location.href='home.php';
                                };
                                var cID = button.id;
                                xhttp.open("GET", "reviewCourse.php?courseID=" + cID + "&rating=" + sim + "&review=" + review+ "&survey=" + 1);
                                xhttp.send();
                            }
                        }
 </script>
 </body>


<style>
    @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
    @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

    body {
            background-image: url("pictures/website/backgroundPattern.png");
        }

        .box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin: auto;
            margin-top: 5%;
            margin-bottom: 5%;
            padding: 50px;
            top: 10%;
            background-color: white;
            width: 40%;
            text-align: center;
        }

    .button {
        background-color: gold;
        border: none;
        color: black;
        padding: 8px 20px;
        text-decoration: none;
        margin: 10px;
        cursor: pointer;
    }

    .button:hover {
        color: white;
        background-color: black;
    }

    .rating>label {
        color: #ddd;
        float: right;
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
        margin-right: 35%;
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
        margin-top: 10px;
    }

    .middle {
        margin-top: 10px;
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

    .bar-5 {
        height: 18px;
        background-color: Gold;
        border-radius: 10px;
    }

    .bar-4 {
        height: 18px;
        background-color: Gold;
        border-radius: 10px;
    }

    .bar-3 {
        height: 18px;
        background-color: Gold;
        border-radius: 10px;
    }

    .bar-2 {
        height: 18px;
        background-color: Gold;
        border-radius: 10px;
    }

    .bar-1 {
        height: 18px;
        background-color: Gold;
        border-radius: 10px;
    }

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
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }
</style>

</body>
</html>