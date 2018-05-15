<?php
	$user_check=$_SESSION['login_user'];
	$ses_sql=mysqli_query($con,"SELECT * FROM user WHERE username ='$user_check'");
	$row=mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
	$login_session=$row['username'];
	$password=$row['password'];
	$user_id=$row['user_id'];
	$phone=$row['phone'];
	if(!isset($_SESSION['login_user']))
		{
			header("location:index.php");
		}
?>

