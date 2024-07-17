<?php
	if(isset($_POST["btn_login"]))
	{
		$email=$_POST["uname"];
		$pswd=$_POST["pswd"];
		if($email=="admin@gmail.com" && $pswd=="admin@123")
		{
		?>
		<script>
			window.location.replace("dashboard.php");
		</script>
		<?php
		}
		else
		{
		?>
		<script>
			alert('Invalid username password');
		</script>
		<?php		
		}		
	}
?>
<?php
	if(isset($_POST['btn_reg']))
	{
		$name = $_POST['name_txt'];
		$m_no = $_POST['mobileno_txt'];
		$city= $_POST['city_sl'];
		$gender= $_POST['gen_btn'];
		$image = $_FILES['image_fl']['name'];		
				
		$cn=mysqli_connect("localhost","root","","demo");
		
		$q="insert into user_info values ('','$name','$m_no','$city','$gender','$image')";
		
		$r=mysqli_query($cn,$q);
		
		if($r)
		{
			move_uploaded_file($_FILES['image_fl']['tmp_name'],"uploaded_img/".$image);
			echo "<h2>1 row(s) inserted</h2>";
		}
		else
		{
			echo "error";
		}		
	}
?>
<html>
<body>
<link rel="stylesheet" href="style.css" media="screen">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		
		<div class="login-form">
			<div class="sign-in-htm">
			<form action="#" method="POST" class="needs-validation" novalidate="" autocomplete="off">
				<div class="group">
				
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="uname" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pswd" required>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" />
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="btn_login">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
				</form>
			</div>
			
			<div class="sign-up-htm">
			<form action="#" method="POST" class="needs-validation" novalidate="" autocomplete="off">
				<div class="group">
				
					<label for="user" class="label">Username/email</label>
					<input id="user" type="text" class="input" name="uname" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" name="pswd" data-type="password">
				</div>
				<div class="group">
					<label for="name" class="label">Name</label>
					<input id="name" type="text" class="input" name="name" required>
				</div>
				<div class="group">
					<label for="state" class="label">State</label>
					<input id="state" type="text" class="input" name="state" required>
				</div>
				<div class="group">
					<label for="district" class="label">District</label>
					<input id="district" type="text" class="input" name="district" required>
				</div>
				<div class="group">
					<label for="city" class="label">City</label>
					<input id="city" type="text" class="input" name="city" required>
				</div>
				<div class="group">
					<label for="age" class="label">Age</label>
					<input id="age" type="text" class="input" name="age" required>
				</div>
				<div class="group">
					<label for="blood_group" class="label">Blood_group</label>
					<input id="blood_group" type="text" class="input" name="blood_group" required>
				</div>
				<div class="group">
					<label for="" class="label">Blood_group</label>
					<input id="blood_group" type="text" class="input" name="blood_group" required>
				</div>
				<div class="group">
					<label for="blood_group" class="label">Blood_group</label>
					<input id="blood_group" type="text" class="input" name="blood_group" required>
				</div>
								
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="btn_reg">
				</div>
				
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>