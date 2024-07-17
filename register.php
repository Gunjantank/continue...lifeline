
<?php
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$image = $_FILES['image_fl']['name'];
		$email= $_POST['email'];
		$m_no = $_POST['m_no'];
		$pswd= $_POST['pswd'];
		$c_pswd= $_POST['c_pswd'];
		$state= $_POST['state'];
		$city= $_POST['city'];
		$pin= $_POST['pincode'];
		$gender= $_POST['gender'];
		$dob= $_POST['birth_date'];
		$b_group= $_POST['blood_group'];
		$h_issue= $_POST['h_issue'];
				
				
		$cn=mysqli_connect("localhost","root","","ms");
		
		$q="insert into registration values ('','$name','$image','$email','$m_no','$pswd','$c_pswd','$state','$city','$pin','$gender','$dob','$b_group','$h_issue')";
		
		$r=mysqli_query($cn,$q);
		
		if($r)
		{
			move_uploaded_file($_FILES['image_fl']['tmp_name'],"uploaded_img/".$image);
			?>
			<script>
				window.location.replace("sign_in.php");
			</script>
			<?php
		}
		else
		{
			?>
			<script>
				alert('SOMETHING WENT WRONG, PLEASE CHECHK IT AND TRY AGAIN');
			</script>
			<?php
			
		}		
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
                        <h2>registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Name :</label>
                                <input type="text" name="name" id="name" required />
                            </div>
                            <div class="form-group">
								<label for="image_fl">Profile picture :</label>
								<input type="file" name="image_fl" id="image_fl"/>
							</div>
                        </div>
						<div class="form-row">
							<div class="form-group">
								<label for="email">Email ID :</label>
								<input type="email" name="email" id="email" required />
							</div>
							<div class="form-group">
								<label for="m_no">Mobile no.:</label>
								<input type="text" name="m_no" id="m_no" required />
							</div>
						</div>
						<div class="form-row">
							<div class="form-group">
								<label for="pswd">password :</label>
								<input type="password" name="pswd" id="pswd" required />
							</div>
							<div class="form-group">
								<label for="c_pswd">confirm password :</label>
								<input type="password" name="c_pswd" id="c_pswd" required />
							</div>
						</div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="state">State :</label>
                                <input type="text" name="state" id="state" required />
                            </div>
                            <div class="form-group">
                                <label for="city">City :</label>
                                <input type="text" name="city" id="city" required />
                            </div>
							<div class="form-group">
								<label for="pincode">Pincode :</label>
								<input type="text" name="pincode" id="pincode">
							</div>
						</div>
							<div class="form-radio">
                            <label for="gender" class="radio-label">Gender :</label>
								<div class="form-radio-item">
									<input type="radio" name="gender" id="male" value="male" checked>
									<label for="male">Male</label>
									<span class="check"></span>
								</div>
								<div class="form-radio-item">
									<input type="radio" name="gender" id="female" value="female">
									<label for="female">Female</label>
									<span class="check"></span>
								</div>
								<div class="form-radio-item">
									<input type="radio" name="gender" id="other" value="other">
									<label for="other">Other</label>
									<span class="check"></span>
								</div>
							</div>
						<div class="form-row">
							<div class="form-group">
								<label for="birth_date">DOB :</label>
								<input type="date" name="birth_date" id="birth_date">
							</div>
							<div class="form-group">
                                <label for="blood_group">Blood Group :</label>
                                <div class="form-select">
                                    <select name="blood_group" id="blood_group" required >
                                        <option value="">select blood group</option>
                                        <option>A+</option>
                                        <option>A-</option>
										<option>B+</option>
										<option>B-</option>
										<option>O+</option>
										<option>O-</option>
										<option>AB+</option>
										<option>AB-</option>
										<option>other</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
						</div>		
							<div class="form-group">
								<label for="h_issue">health issue(if any) :</label>
								<input type="text" name="h_issue" id="h_issue">
							</div>
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
						<br/>
						<center>
						<div class="submit">
						<a  href="signin.php"
							<h3><i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"> one of us ??  </i>
							Login </h3>
						</a>
					</div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>