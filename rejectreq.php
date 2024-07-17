<?php
	session_start();
	$sid=$_REQUEST['id'];
	$uid=$_SESSION['user_id'];
	$uname=$_SESSION['username'];
	$cn= mysqli_connect("localhost","root","","ms");
			$q="UPDATE r_request set status=2 where receiver_id = '$uid'";
			echo $q;
			$r=mysqli_query($cn,$q);
								
			if($r)
			{
			?> 
				<script>
				alert('Succesfully');
				window.location="received_request.php";
				</script> 
			<?php
			}
			else
			{
				echo "error";
			}								
?>

