<?php 
session_start();
include "../lib/common.php";

	$user_id = $_SESSION['user_id']; echo "<br>";
	$destination_id = $_POST['destination_id']; echo "<br>";
	$day = $_POST['day']; echo "<br>";
	$time = $_POST['time']; echo "<br>";

	$sql = "INSERT INTO `temp_plan`( `user_id`, `destination_id`, `day`, `time`) VALUES 
	 		('".$user_id."','".$destination_id."','".$day."','".$time."')";

	if($query = mysqli_query(connect(), $sql)){
            echo '<script>alert("New activity has been added");</script>';
            echo '<script>window.location.href="plan.php" </script>';
	}else{
            echo '<script>alert("Fail to new activity");</script>';
            echo '<script>window.location.href="addplan_details.php" </script>';
	}
?>	