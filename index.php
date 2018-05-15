<html>

<style>
body {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-top: 1em;
}

button:hover {
background: #ccc;
cursor: pointer;
}

fieldset{
width: 50em;
padding: 1em;
border: 1px solid #ccc;
margin: auto;
background: grey;
}
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 30em;
padding: 1em;
border: 1px solid #ccc;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm label {
text-align: left;
display: block;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="datetime-local"],
.myForm select,
.myForm textarea {
float: right;
width: 60%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm input[type="radio"],
.myForm input[type="checkbox"] {
margin-left: 40%;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-left: 40%;
margin-top: 1.8em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}

</style>
	<body>	
        
<br><br>
	<center>
	<fieldset>
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
					<td><input style="color:red" type="submit" name="login" value="Login"></td>
				</tr>
			</table>
		</form></fieldset>
		<br><br>
			
			<fieldset>
		<legend><br><br><h4><b><font face="Cursive" color="black">Not a user yet? Sign up here! </font></b></h4></legend>
		<form method="post" enctype="multipart/form-data">
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
					<td>Email : </td>
					<td> <input type="text" name="email"></td>
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
					<td>Your profile picture:</td>
					<td><input type="hidden" name="size" value="1000000"></td>
				</tr>
				<tr>
					<th></th>
					<td><div>
  						<input type="file" name="image">
					</div></td>
				</tr>
				<tr>
					<td> &nbsp;</td>
					<td><center><input style="color:red" type="submit" name="signup" value="Sign up"></center></td>
				</tr>
			</table>
		</form>
		</fieldset>
	</center>			 
	</body>
</html>

