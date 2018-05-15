<?php
include 'include/header2.php'; 
include 'session.php';
include 'connect.php';

	//date_default_timezone_set("Asia/Kuala Lumpur");
	//echo "The time is " . date("d-m-Y h:i:sa");


	$checkIn = $_POST['CheckIn'];
	$checkout = $_POST['CheckOut'];
	$adult = $_POST['Adults'];
	$kids = $_POST['Kids'];
	$user_id = $user_id;
	//$date_time = $_POST['date("d-m-Y h:i:sa")']
	//$duration = $_POST[$checkout - $checkIn];
	$hotel_id = $_GET['hotel_id'];
	

	$sql =  "INSERT INTO book (CheckIn,CheckOut,NoAdult,NoChildren, user_id, hotel_id, status)
            VALUES ('$checkIn', '$checkout', $adult, $kids, '$user_id', $hotel_id, 'pending')";

			
	if(! mysqli_query($con,$sql)) {
     		echo('Could not enter data: ' . mysqli_error());
  	} else {
			echo "  <div class='w3-modal-content w3-card-4 w3-animate-zoom' style='padding:32px;max-width:600px'>
					<div class='w3-container w3-white w3-center'>
					<h1 class='w3-wide'>Booking Successful</h1>";
			echo $checkIn;
			echo "<br><br>";
			echo $checkout;
			echo "	<p>Successfully made an offer.</p>
					<div class='w3-row'>
					<div class='w3-half'>
					<a href='mybookingstatus.php'><button onclick='document.getElementById('id01').style.display='none'' type='button' class='w3-button w3-block w3-green'>View Status</button>
					</div>
					<div class='w3-half'>
					<a href='homepage.php'><button onclick='document.getElementById('id01').style.display='none'' type='button' class='w3-button w3-block w3-red'>Done</button></a>
					</div>
					</div>
					</div>
					</div>";
	}
?>


<?php include 'include/footer.php'; ?>