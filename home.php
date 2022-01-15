<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body {
            background-image: url("pictures/website/backgroundPattern.png");
        }

        .box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin: auto;
            margin-top: 5%;
            margin-bottom: 5%;
            padding: 20px;
            top: 10%;
            background-color: white;
            width: 600px;
            height: 400px;
        }

        .title {
            text-align: center;
        }

        hr {
            width: 25%;
            margin: auto;
        }

        p {
            text-align: center;
            margin: 5%;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include "menu.php";
    ?>
    <div class="box">
        <h1 class="title">Service</h1>
        <hr>
        <p>
            Learnster offers a multitude of services that aid students and teachers alike in learning new skills and improving their current ones. <br><br>
            We offer an online learning community with thousands of classes for creative and curious people,
            members come together to find inspiration and take the next step in their creative journey. <br>
        </p>
        <ul>
            <li>Master essential career skills based on comprehensive skills data.</li><br>
            <li>Build personal and professional skills with applied learning.</li><br>
            <li>Explore hundreds of free and paid courses.</li><br>
            <li>Learn from experts at 200+ leading universities and companies.</li><br>
        </ul>
        <p>Achieve your goals on Learnsters.</p>
    </div>
    <div class="box">
        <h1 class="title">Mission</h1>
        <hr>
        <p>
            We believe learning is the source of human progress. <br>
            It has the power to transform our world from illness to health, from poverty to prosperity, from conflict to peace. <br>
            It has the power to transform our lives for ourselves, for our families, for our communities. <br><br>
            No matter who we are or where we are, learning empowers us to change and grow and redefine what's possible.
            That's why access to the best learning is a right, not a privilege. <br><br>
            And that's why Learnsters is here. <br>
            We partner with the best institutions to bring the best learning to every corner of the world.
            So that anyone, anywhere has the power totransform their life through learning. <br><br><br>
            Serving the world through learning.
        </p>
    </div>
</body>

</html>