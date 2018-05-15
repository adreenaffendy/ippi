<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--<link rel="stylesheet" href="copycss.css">-->

<?php 
include 'include/header2.php'; 
include 'session.php';
include 'connect.php';


	if(!empty($_FILES['image1']['name'])){
	$target1 = "images/ " . basename($_FILES['image1']['name']);
	}else{
		$target1 = "images/photo_2017-12-06_18-58-07.jpg";
	}
	
	if(!empty($_FILES['image2']['name'])){
	$target2 = "images/ " . basename($_FILES['image2']['name']);
	}else{
		$target2 = "images/photo_2017-12-06_18-58-07.jpg";
	}
	
	if(!empty($_FILES['image3']['name'])){
	$target3 = "images/ " . basename($_FILES['image3']['name']);
	}else{
		$target3 = "images/photo_2017-12-06_18-58-07.jpg";
	}
	
	if(!empty($_FILES['image4']['name'])){
	$target4 = "images/ " . basename($_FILES['image4']['name']);
	}else{
		$target4 = "images/photo_2017-12-06_18-58-07.jpg";
	}

	
	$namePlace = $_POST['namePlace'];
	$type = $_POST['type'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$price = $_POST['price'];
	$checkIn = $_POST['CheckIn'];
	$checkout = $_POST['CheckOut'];
	$guest = $_POST['guest'];
	$rules1 = $_POST['rules1'];
	$rules2 = $_POST['rules2'];
	$rules3 = $_POST['rules3'];
	$rules4 = $_POST['rules4'];
	$rules5 = $_POST['rules5'];
	$bed = $_POST['bed'];
	$extras = implode(',', $_POST['extras']);
	$image1 = $_FILES['image1']['name'];
	$image2 = $_FILES['image2']['name'];
	$image3 = $_FILES['image3']['name'];
	$image4 = $_FILES['image4']['name'];
	$user_id = $user_id;

	$sql =  "INSERT INTO hotel (namePlace, type, name, address, gender, phone, price, CheckIn, CheckOut, guest, rules1, rules2, rules3, rules4, rules5, bed, extras, image1, image2, image3, image4, user_id)
            VALUES ('$namePlace', '$type', '$name', '$address', '$gender', '$phone', '$price', '$checkIn', '$checkout', '$guest', '$rules1', '$rules2', '$rules3', '$rules4', '$rules5', '$bed', '$extras', '$target1', '$target2', '$target3', '$target4', '$user_id')";
					
	
	if(!mysqli_query($con, $sql)) {
     		echo('Could not enter data: ' . mysql_error());
  	}
  	else {
    		echo "  <div class='w3-modal-content w3-card-4 w3-animate-zoom' style='padding:32px;max-width:600px'>
    				<div class='w3-container w3-white w3-center'>
      					<h1 class='w3-wide'>Congratulations</h1>
      					<p>You just listed you space for rent.</p>
     						<div class='w3-row'>
        						<div class='w3-half'>
          						<a href='mylisting.php'><button onclick='document.getElementById('id01').style.display='none'' type='button' class='w3-button w3-block w3-green'>View My Listing</button></a>
        						</div>
        						<div class='w3-half'>
          						<a href='homepage.php'><button onclick='document.getElementById('id01').style.display='none'' type='button' class='w3-button w3-block w3-red'>Back to Home Page</button></a>
        						</div>
      						</div>
    				</div>
  					</div>";
  			}
	
	if(move_uploaded_file($_FILES['image1']['tmp_name'], $target1)){
		$msg = "success1";
	}else{
		$msg = "error";
	}
	
	if(move_uploaded_file($_FILES['image2']['tmp_name'], $target2)){
		$msg = "success2";
	}else{
		$msg = "error";
	}
	
	if(move_uploaded_file($_FILES['image3']['tmp_name'], $target3)){
		$msg = "success3";
	}else{
		$msg = "error";
	}
	
	if(move_uploaded_file($_FILES['image4']['tmp_name'], $target4)){
		$msg = "success4";
	}else{
		$msg = "error";
	}


?>



</html>

<?php include 'include/footer.php'; ?>