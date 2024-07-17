<?php

include "header.php";
$uid=$_SESSION['user_id'];
?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Accepted Request</h2>
              
            </div>
			<div class="col-md-12">
              <div class="card card-plain">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
						<th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>contact</th>
						<th>state</th>
                        <th>City</th>
						<th>pincode</th>
						<th>blood group</th>
						<th>health issue </th>
                        <th>status</th>
                      </thead>
                       <?php
							$cn= mysqli_connect("localhost","root","","ms");
							
							$username = $_SESSION['username'];
							
							
							$q="select * from r_request where status=1";
							
							$r=mysqli_query($cn,$q);
							while($row=mysqli_fetch_array($r))
							{
								$status = $row['status'];
								$receiver_id=$row['receiver_id'];
								$reg_id = $row['reg_id'];
								if($reg_id==$uid)
								{
									$qq="select * from registration where r_id='$receiver_id'";
									$cc=mysqli_query($cn,$qq);
									while($rr=mysqli_fetch_array($cc))
									{
									?>
										
									<tbody>
									<tr>
										<?php $rid = $rr['r_id']; ?>
										<?php $name = $rr['name'] ;?>
										<?php $email = $rr['email'] ;?>
										<?php $contact = $rr['contact'];?>
										<?php $state = $rr['state']; ?>
										<?php $city = $rr['city']; ?>
										<?php $pincode = $rr['pincode']; ?>
										<?php $blood_grp = $rr['blood_group']; ?>
										<?php $h_issue = $rr['health_issue']; ?>
										<td><?php echo $rid; ?></td>
										<td><?php echo $name ?></td>
										<td><?php echo $email ?></td>
										<td><?php echo $contact ?></td>
										<td><?php echo $state ?></td>
										<td><?php echo $city ?></td>
										<td><?php echo $pincode ?></td>
										<td><?php echo $blood_grp ?></td>
										<td><?php echo $h_issue ?></td>
										<td><?php echo "accepted"; ?></td>
									</tr>
								</tbody>
							<?php } } }?><?php
							$qq="select * from r_request where status=2";
							
							$r1=mysqli_query($cn,$qq);
							while($row1 = mysqli_fetch_array($r1))
							{
								$receiver_id1 = $row1['receiver_id'];
								$reg_id1 = $row1['reg_id'];
								if($reg_id1 == $uid)
								{
									$qq="select * from registration where r_id='$receiver_id1'";
									$cc=mysqli_query($cn,$qq);
									while($rr=mysqli_fetch_array($cc))
									{
									?>
										
									<tbody>
									<tr>
										<?php $rid = $rr['r_id']; ?>
										<?php $name = $rr['name'] ;?>
										<?php $email = $rr['email'] ;?>
										<?php $contact = $rr['contact'];?>
										<?php $state = $rr['state']; ?>
										<?php $city = $rr['city']; ?>
										<?php $pincode = $rr['pincode']; ?>
										<?php $blood_grp = $rr['blood_group']; ?>
										<?php $h_issue = $rr['health_issue']; ?>
										<td><?php echo $rid; ?></td>
										<td><?php echo $name ?></td>
										<td><?php echo "-" ?></td>
										<td><?php echo "-" ?></td>
										<td><?php echo $state ?></td>
										<td><?php echo $city ?></td>
										<td><?php echo $pincode ?></td>
										<td><?php echo $blood_grp ?></td>
										<td><?php echo $h_issue ?></td>
										<td><?php echo "rejected"; ?></td>
									</tr>
								</tbody>
							<?php } } }?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
        </div>
      </div>
<?php

	include "footer.php";
	
?>