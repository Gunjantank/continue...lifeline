<?php
	session_start();
	$sid=$_REQUEST['id'];
	$uid=$_SESSION['user_id'];
	$uname=$_SESSION['username'];
	$cn= mysqli_connect("localhost","root","","ms");
			$q="select * from registration where r_id='$sid'";
			
			$r=mysqli_query($cn,$q);
			while($row=mysqli_fetch_array($r))
			{
				$rid = $row['r_id'];
					$name = $row['name'];
					 $state = $row['state'];
					 $email = $row['email'];
					 $city = $row['city'];
					 $pincode = $row['pincode'];
					 $blood_grp = $row['blood_group'];
					$h_issue = $row['health_issue'];
			
			$qq="insert into r_request values (' ','$rid','$name','$email','$state','$city','$pincode','$blood_grp','$h_issue','$uid',' ')";
														
			$rr=mysqli_query($cn,$qq);
										
			if($rr)
			{
			?> 
				<script>
				alert('Your Request has Succesfully Sent!!!!');
				window.location="post_request.php";
				</script> 
			<?php
			}
			else
			{
				echo "error";
			}
			
		}								
?>

