<?php 
include 'include/header.php';
?>

<html>
	<head>
		<title>Travel with Tabung Haji!</title>
</head>
	
	<body>	
                
<?php
session_start();
require 'connect.php';
//if($_SERVER["REQUEST_METHOD"]=="POST")
if(isset($_POST['login']))
	{
//require 'connect.php';
$username =mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$result=mysqli_query($con, "SELECT * from user where username='$username' and password='$password'"); 
	var_dump(mysqli_num_rows($result));
	if(mysqli_num_rows($result)== 1)
	{
	$_SESSION['username']=$row['username'];
	$_SESSION['password']=$row['password'];
	$_SESSION['login_user']=$username;
		echo '<script type="text/javascript"> window.location="homepage.php" </script>';
	}
	else{
	
	echo "User invalid";
	}

	}

if(isset($_POST['signup']))
	{
	require 'connect.php';
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$nric=$_POST['NRIC_no'];
	$phone=$_POST['phone'];
	$user_id=$_POST['user_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	$result=mysqli_query($con, "INSERT INTO user (firstname, lastname,NRIC_no, phone,user_id, username, password) VALUES ('$firstname','$lastname','$nric','$phone','$user_id','$username','$password')"); 

		header('Location:index.php');
	
	
		
}


if(isset($_GET['Logout']))
{
	session_unregister('username');
}
?>


<br><br>
<center>
<form method="post" action="">
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td>Username</td>
			<td> <input type="text" name="username"></td>

		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		
		<tr>
			<td> &nbsp;</td>
			<td><input type="submit" name="login" value="Login"></td>
		</tr>
	</table>
</form>
<br><br>
		
		<h3><b><font face="Cursive" color="black">Not a user yet? Sign up here! </font></b></h3>
	<form method="post">
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td>First name : </td>
			<td> <input type="text" name="firstname"></td>

		</tr>
		<tr>
			<td>Last name : </td>
			<td><input type="text" name="lastname"></td>
		</tr>
		<tr>
			<td>Phone Number : </td>
			<td> <input type="text" name="phone"></td>
		</tr>
		<tr>
			<td>NRIC number: </td>
			<td> <input type="text" name="NRIC_no"></td>

		</tr>
		<tr>
			<td>Username : </td>
			<td> <input type="text" name="username"></td>

		</tr>
		<tr>
			<td>Password : </td>
			<td> <input type="password" name="password"></td>

		</tr>
		
		<tr>
			<td> &nbsp;</td>
			<td><input type="submit" name="signup" value="Sign up"></td>
		</tr>
	</table>
</form>
	</center>	


		 
</body>

</html>

