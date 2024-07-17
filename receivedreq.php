<?php
session_start();

if(isset($_REQUEST['id']) && isset($_SESSION['username'])) {
    $sid = $_REQUEST['id'];
    $username = $_SESSION['username'];
    
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
        
        $cn = mysqli_connect("localhost", "root", "", "ms");
        
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        
        // Update status based on action
        if ($action === 'accept') {
            $q = "UPDATE r_request SET status = 1 WHERE r_id = '$sid' AND status = 0";
        } elseif ($action === 'reject') {
            $q = "UPDATE r_request SET status = 2 WHERE r_id = '$sid' AND status = 0";
        }
        
        $r = mysqli_query($cn, $q);
        
        // Check if update was successful
        if ($r) {
            header('Location: received_request.php');
            exit();
        } else {
            echo "Error updating request.";
        }
    } else {
        echo "Invalid action.";
    }
} else {
    echo "Unauthorized access.";
}
?>
