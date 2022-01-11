
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<?php
// session start
session_start();

// include DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab10";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$receiver = $_GET['receiver'];
include "menu.php";

$getReceiver = "SELECT * FROM user WHERE id = '$receiver'";
$getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
$getReceiverRow = mysqli_fetch_array($getReceiverResult);
?>

<img src="./images/<?=$getReceiverRow['image']?>" class="img-circle" width = "40"/>
<strong><?=$getReceiverRow['Name']?></strong>

<div id="chat-box">

</div>

<div class="mx-auto" style="width: 75%;">
<form class="form-inline" action="" method = "POST">
	<input type="hidden" name = "sent_by" value = "<?=$_SESSION['ID']?>"/>
	<input type="hidden" name = "received_by" value = "<?=$receiver?>"/>
	<input type="text" name = "message"  class="form-control" placeholder = "Type your message here" required/>
	<input type = "submit" value='send' name='submit' id="submit" class="btn btn-primary">
</form>
</div>

<script type="text/javascript">

	var timer, delay = 0;
	timer = setInterval(function(){
		$.ajax({
		type: "GET",
		url: "chat-box.php?receiver=<?=$receiver?>",
		dataType: "html",
		success: function(response){
			$("#chat-box").html(response); 
		}
	});
	},delay);

</script>



<?php
if(isset($_POST['submit'])) {
	$createdAt = date("Y-m-d h:i:sa");
	$sent_by = $_POST['sent_by'];
	$receiver = $_POST['received_by'];
	$message = $_POST['message'];
	$sendMessage = "INSERT INTO messages(sent_by,received_by,message,createdAt) VALUES('$sent_by','$receiver','$message','$createdAt')";
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
}
?>




