<?php
include "header.php";

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $cn = mysqli_connect("localhost", "root", "", "ms");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Fetch requests that are not accepted or rejected for any user
    $q = "SELECT r_request.*, registration.name, registration.state, registration.city, registration.pincode, registration.blood_group, registration.health_issue
          FROM r_request
          INNER JOIN registration ON r_request.reg_id = registration.r_id
          WHERE r_request.r_email = '$username' AND r_request.status = 0";
    $r = mysqli_query($cn, $q);

    if (mysqli_num_rows($r) > 0) {
        ?>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2 class="card-title">Received Requests</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Pincode</th>
                                        <th>Blood Group</th>
                                        <th>Health Issue</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row = mysqli_fetch_array($r)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['r_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['state']; ?></td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['pincode']; ?></td>
                                            <td><?php echo $row['blood_group']; ?></td>
                                            <td><?php echo $row['health_issue']; ?></td>
                                            <td>
                                                <a href="receivedreq.php?id=<?php echo $row['r_id']; ?>&action=accept" onclick="return confirmAction('accept', '<?php echo $row['r_id']; ?>');">
                                                    <input type="button" class="btn btn-primary btn-round" name="send" value="Accept Request">
                                                </a>
                                                <a href="receivedreq.php?id=<?php echo $row['r_id']; ?>&action=reject" onclick="return confirmAction('reject', '<?php echo $row['r_id']; ?>');">
                                                    <input type="button" class="btn btn-primary btn-round" name="send" value="Reject Request">
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function confirmAction(action, requestId) {
                if (confirm(`Are you sure you want to ${action} this request?`)) {
                    // Redirect to receivedreq.php with action and request ID
                    window.location.href = `receivedreq.php?id=${requestId}&action=${action}`;
                    return true;
                }
                return false;
            }
        </script>

        <?php
    } else {
        ?>
        <div class="content" style="display: flex; justify-content: center; align-items: center; height: 80vh;">
            <div class="card text-center" style="width: 400px; background-color: #9c27b0; color: #fff; padding: 20px;">
                <h3>No pending requests</h3>
            </div>
        </div>
        <?php
    }
} else {
    echo "Unauthorized access.";
}

include "footer.php";
?>
