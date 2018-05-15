<?php
	session_start();
	include('include/header.php');
	session_destroy();
	
	echo "<script>setTimeout(function() {window.location.href = 'index.php';}, 500)</script>";

	// if(isset($_SESSION['username'])){
	// 	$username = $_SESSION['username'];
		
	// 	$sql= "UPDATE user SET logout_time = now() 
	// 			WHERE username = '$username'";    

	// 	$result= mysql_query($sql);

	// 	if ($result= mysql_query($sql)) {
	// 		echo "<script>setTimeout(function() {window.location.href = 'index.php';}, 500)</script>";
	// 	}
	// 	else{
	// 		echo "Failed to logout";
	// 	}
	// }
?>

<html>
	<head>
	    <title></title>
	</head>
	<body>
		<h3>You have sucessfully logged out!</h3>
	</body>
</html>