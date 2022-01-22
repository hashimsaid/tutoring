<html>

<head>
    <link rel="stylesheet" href="css/main.css">
    <style>
        body {
            background-image: url("pictures/website/backgroundPattern.png");
        }

        .warning {
            color: red;
            text-align: center;
            font-weight: bold;
        }

        .box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin: auto;
            margin-top: 5%;
            margin-bottom: 5%;
            padding: 50px;
            top: 10%;
            background-color: white;
            width: 35%;
            text-align: center;
        }

        table {
            margin:50px;
            border-collapse: collapse;
            width: 70%;
        }

        td,
        th {
            border: 1px solid black;
            padding: 8px;
        }

        tr{
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #38968d;
            color: white;
        }

        .link {
            margin: 50px;
            text-decoration: none;
            background-color: #38968d;
            color: white;
            border-radius: 10%;
            padding: 6px;
            font-weight: bold;
        }

        .link:hover {
            text-decoration: none;
            background-color: #1b6145;
            color: white;
            border-radius: 10%;
            padding: 6px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include "connectToDb.php";
    include "menu.php";

    $sql = "SELECT id,sent_by,message,comment FROM messages";
				
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Message ID</th><th>The Message</th><th>Sent By</th> <th>Comment</th> <th>Add Comment</th> ";
        while ($row = $result->fetch_assoc()) {

            $sql2 = "Select * from learners where learnerID ='" . $row['sent_by'] . "'";
            $result2 = mysqli_query($conn, $sql2);
            if ($row2 = mysqli_fetch_array($result2)) {
            }else{
            $sql2 = "Select * from adminstrators where adminID ='" . $row['sent_by'] . "'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($result2);
            }

            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["message"]."</td><td>". $row2["Fname"] . "</td> <td>". $row["comment"] . "</td> <td><a href=addComment.php?id=" . $row["id"] . " class='link'>ADD</a></td></tr>"."";
        }
        echo "</table>";
    } else {
        echo "
        <div class='box'><div class='warning'>0 results</div>";
    }
    ?>
    

</body>


</html>