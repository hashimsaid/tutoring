<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab10";

$conn = new mysqli($servername, $username, $password, $dbname);

include "menu.php";
 
?>

<form>

<div class="mx-auto" style="width: 75%;">

    <label for="Name" class="form-label">
		Name
	</label>

    <input type="text" class="form-control" name="Name_Search" id="Name_Search" placeholder="Enter The Name You Want To Search">
	<div id="result"></div>

  </div>

</form>

<script>

	$(document).ready(function(){

		$('#Name_Search').keyup(function(){
			var txt = $(this).val()
			if(txt != ''){

				$.ajax({
					url: "fetch.php",
					method: "post",
					data: {search:txt},
					dataType: "text",
					success: function(data){
						$('#result').html(data);
					}
				})
				
			}
			else{
				$('#result').html('')
			}
		})
	})

</script>


<div class="mx-auto" style="width: 75%;">
<?php
$lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = ".$_SESSION['ID'];
$lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($lastMessageResult) > 0) {
	while($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
		$sent_by = $lastMessageRow['sent_by'];
		$getSender = "SELECT * FROM user WHERE ID = '$sent_by'";
		$getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
		$getSenderRow = mysqli_fetch_array($getSenderResult);
		?>
		<div>
		<img src = "./images/<?=$getSenderRow['image']?>" class="img-circle" width = "40"/> 
		<?=$getSenderRow['Name'];?>
		<a href="./message.php?receiver=<?=$sent_by?>">Send message</a>
		</div><br>
<?php }
} 
else {
	echo "No conversations yet!";
}
?>
</div>

