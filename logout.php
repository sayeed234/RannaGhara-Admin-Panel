<?php
	session_start();
	$myusername = $_SESSION['admin'];

	
	$con=mysqli_connect("localhost","root","","rannaghara");
	if ($con) {
       $active_sql = "UPDATE adminlock SET active='0' WHERE username='$myusername'";
       if ($con->query($active_sql) === TRUE) {
        echo "Record updated successfully";
        header("location: adminlock.php");
       } else {
        echo "Error updating record: " . $conn->error;
      }
	
	}
	session_destroy();
?>