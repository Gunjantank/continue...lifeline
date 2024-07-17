<?php
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; // Retrieve logged-in user's email from session

// Retrieve logged-in user's city from the database
$cn = mysqli_connect("localhost", "root", "", "ms");
if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_city_query = "SELECT city FROM registration WHERE email='$username'";
$user_city_result = mysqli_query($cn, $user_city_query);
if ($user_city_result) {
    $user_city_row = mysqli_fetch_assoc($user_city_result);
    $user_city = $user_city_row['city'];
} else {
    die("Error retrieving user city: " . mysqli_error($cn));
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h2 class="card-title">Post Request</h2>
            </div>
            <div class="card-body">
                <div class="input-group no-border">
                    <form method="POST" action="#">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" value="" class="form-control" placeholder="Search blood group" name="searchtxt">
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="city_option">
                                    <option value="same">Same City</option>
                                    <option value="different">Different City</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary btn-round" name="searchbtn" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if (isset($_POST['searchbtn'])) {
                                $seardata = $_POST['searchtxt'];
                                $city_option = $_POST['city_option'];

                                if (empty($seardata)) {
                                    echo "<div class='alert alert-warning' role='alert'>Please enter a blood group to search.</div>";
                                } else {
                                    // Base query to select all users with the given blood group and not the logged-in user
                                    $query_base = "SELECT r_id, name, state, city, pincode, blood_group, health_issue 
                                                   FROM registration 
                                                   WHERE blood_group='$seardata' AND email != '$username'";

                                    if ($city_option == "same") {
                                        // Extend the query to filter by users in the same city
                                        $query_base .= " AND city='$user_city'";
                                    } else if ($city_option == "different") {
                                        // Extend the query to filter by users in different cities
                                        $query_base .= " AND city!='$user_city'";
                                    }

                                    $result = mysqli_query($cn, $query_base);

                                    if (mysqli_num_rows($result) > 0) {
                                        ?>
                                        <table class="table table-hover">
                                            <thead class="">
                                                <th>Name</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Pincode</th>
                                                <th>Blood Group</th>
                                                <th>Health Issue</th>
                                                <th>Action</th>
                                            </thead>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tbody>
                                                <tr>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['state']; ?></td>
                                                    <td><?php echo $row['city']; ?></td>
                                                    <td><?php echo $row['pincode']; ?></td>
                                                    <td><?php echo $row['blood_group']; ?></td>
                                                    <td><?php echo $row['health_issue']; ?></td>
                                                    <td>
                                                        <a href="postrequest.php?id=<?php echo $row['r_id']; ?>">
                                                            <input type="button" class="btn btn-primary btn-round" name="send" value="Send Request">
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                        <?php
                                    } else {
                                        if ($city_option == "same") {
                                            echo "<div class='alert alert-warning' role='alert'>No users found with blood group '$seardata' in the same city.</div>";
                                        } else if ($city_option == "different") {
                                            echo "<div class='alert alert-warning' role='alert'>No users found with blood group '$seardata' in different cities.</div>";
                                        } else {
                                            echo "<div class='alert alert-warning' role='alert'>No users found with blood group '$seardata'.</div>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>Please search for the required blood group and you will get data like name, state, city, etc...</h2>
    </div>
</div>

<?php
include "footer.php";
?>
