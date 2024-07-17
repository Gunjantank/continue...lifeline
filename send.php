<?php
	include "post_request.php";
	$cn=mysqli_connect("localhost","root","","ms");
	
	$name = $_POST['name'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$blood_grp = $_POST['blood_grp'];
	$h_issue = $_POST['h_issue']; 
	
	$qq="insert into r_request values (' ','$name','$state','$city','$pincode','$blood_grp','$h_issue')";
										
	$rr=mysqli_query($cn,$qq);
					
	if($rr)
	{
	?>
		echo "<script>alert('1 row(s) inserted'); 
				window.location.replace("post_request.php");</script>";
	<?php
	}
	else
	{
		echo "error";
	}
?>