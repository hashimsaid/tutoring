<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
	body {
		background-image: url("pictures/website/backgroundPattern.png");
	}

	#send{
		text-decoration: none;
		background-color: #38968d;
		color: white;
		border-radius: 10%;
		padding: 6px;
		font-weight: bold;
	}

	.box {
            box-shadow: 10px 10px rgba(0, 0, 0, 0.5);
            margin-top: 5%;
            margin-bottom: 5%;
            padding: 30px;
            top: 10%;
            background-color: white;
            width: 50%;
            

        }

		#Name_Search{
		   width: 52%;
		}
</style>

<?php
session_start();

include 'connectToDb.php';

include "menu.php";

?>

<form>

	<br>
	<div class="p-4" style="width: 60%;">
		<input type="text" class="form-control" name="Name_Search" id="Name_Search" placeholder="Enter The Name You Want To Search">
		<div id="result"></div>
		<div class="p-2">
	<?php
		$lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = '$_SESSION[ID]'";
		$lastMessageResult = mysqli_query($conn, $lastMessage);
		if (mysqli_num_rows($lastMessageResult) > 0) {
			while ($lastMessageRow = mysqli_fetch_array($lastMessageResult)) {
				$sent_by = $lastMessageRow['sent_by'];

				$getSender = "SELECT * FROM learners WHERE learnerID = '$sent_by'";
				$getSender2 = "SELECT * FROM adminstrators WHERE adminID = '$sent_by'";

				if($_SESSION['Type']=='learner'){
					$getSenderResult = mysqli_query($conn, $getSender2) or die(mysqli_error($conn));
				}else{
					$getSenderResult = mysqli_query($conn, $getSender) or die(mysqli_error($conn));
				}
				$getSenderRow = mysqli_fetch_array($getSenderResult);
		?>
				<div class="box" >
					<?= $getSenderRow['Fname']; ?>
					<a id="send" href="./message.php?receiver=<?= $sent_by ?>">Send message</a>
				</div><br>
		<?php }
		} else {
			echo "No conversations yet!";
		}
	?>
</div>
	</div>

</form>

<script>
	$(document).ready(function() {

		$('#Name_Search').keyup(function() {
			var txt = $(this).val()
			if (txt != '') {

				$.ajax({
					url: "fetch.php",
					method: "post",
					data: {
						search: txt
					},
					dataType: "text",
					success: function(data) {
						$('#result').html(data);
					}
				})

			} else {
				$('#result').html('')
			}
		})
	})
</script>


