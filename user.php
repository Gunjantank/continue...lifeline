<?php
	include "header.php"
?>
<div class="content">
        <div class="container-fluid">
		
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
				
				<?php
				
						$email=$_SESSION['username'];
					
						$cn = mysqli_connect("localhost","root","","ms");
						
						$q = "select *  from registration where email = '$email'";

						$c = mysqli_query($cn,$q);
						
						while($rr=mysqli_fetch_array($c))
						{
							$img=$rr['profile_pic'];
							$name=$rr['name'];
							$contact=$rr['contact'];
							$city=$rr['city'];
							$state=$rr['state'];
							$pincode=$rr['pincode'];
							$gender=$rr['gender'];
							$birthdate=$rr['dob'];
							$bloodgroup=$rr['blood_group'];
							$healthissue=$rr['health_issue'];
						}
				
						

				?>
				<a href="#pablo">
						<center><img class="img" src="uploaded_img/<?php echo $img; ?>" height=20% width=20%>
                  </a></br></br></br>
                  <h4 class="card-title">Edit Profile</h4></center>
                </div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" value="<?php echo $_SESSION['username'];?>" disabled class="form-control" name="mail">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" value="<?php echo $name;?>" name="name" disabled >
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <input type="email" value="<?php echo $gender;?>" disabled  class="form-control" name="gen">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Birth Date</label>
                          <input type="text" class="form-control" value="<?php echo $birthdate;?>" name="birthd" disabled >
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Blood Group</label>
                          <input type="email" value="<?php echo $bloodgroup;?>"  disabled class="form-control" name="bgroup">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">health issue </label>
                          <input type="text" class="form-control" value="<?php echo $healthissue;?>" name="hissue"  >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">contact</label>
                          <input type="text" class="form-control"  value="<?php echo $contact;?>" name="mobno">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">state</label>
                          <input type="text" class="form-control"  value="<?php echo $state;?>" name="st">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">pincode</label>
                          <input type="text" class="form-control" name="pin"  value="<?php echo $pincode;?>" >
                        </div>
                      </div>
					  <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="ct"  value="<?php echo $city;?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="upprofile" >Update Profile</button>
                    <div class="clearfix"></div>
					
					<?php
						if(isset($_POST["upprofile"]))
						{
										$healthiss = $_POST["hissue"];
										$cont = $_POST["mobno"];	
										$stat = $_POST["st"];
										$cty = $_POST["ct"];
										$pincode = $_POST["pin"];
								$con = mysqli_connect("localhost","root","","ms");	
								$que = "update registration set contact = '$cont',
																pincode = '$pincode',
																health_issue = '$healthiss',
																state = '$stat',
																city = '$cty' 
																where email = '$email'";
										$ca = mysqli_query($con,$que);
										
										if($ca)
										{
											?>
											<script>
												alert("your profile has successfully updated");
											</script>
											<?php
										}
						
						}
					?>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
	  <?php
	include "footer.php"
?>