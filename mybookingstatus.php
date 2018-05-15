<?php 
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';
?>

<!DOCTYPE html>
<html>
<title>Areen Travel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="copycss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>

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

</style>
<body>
<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

	<p><i class="fa fa-eye" style="font-size:24px;color:blue"></i><a href="#Pending">     Pending</a></p>
	<p><i class="fa fa-check-circle" style="font-size:24px;color:green"></i><a href="#Accepted">     Accepted</a></p>
	<p><i class="fa fa-close" style="font-size:24px;color:red"></i><a href="#Rejected">     Rejected</a></p>

  <div class="w3-container w3-padding-32" id="Pending">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Pending</h3>

<div class="w3-row-padding">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_id = $user_id;


$sql = "SELECT book. * , hotel. * FROM book INNER JOIN hotel ON book.hotel_id = hotel.hotel_id WHERE book.user_id =' ". $user_id ." ' AND STATUS =  'pending'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		
			$start_ts = strtotime($row['CheckIn']);
			$end_ts   = strtotime($row['CheckOut']);
			$diff     = floor(($end_ts - $start_ts)/ (60*60*24));
			$price = $row['price'];
			$total = $diff * $price;
			$status = $row["status"];
			
		
		echo "<div class='w3-col l3 m6 w3-margin-bottom' style='border-style: ridge;'><br>";
		
?>

		<img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">

<?php

		echo "<br><h4><strong><a href='#'>". $row["namePlace"]. "</a></strong></h4>
		<p>Check In on:" . $row["CheckIn"] . " </p>
		<p>Check Out on: " . $row["CheckOut"] . " </p>
		<p>Booking for: ";
		echo $diff; echo " days";
		echo "<br><br><strong>Total to pay: RM ";
		echo $total; echo "</strong>";
		echo "<p>Booking for: " . $row["NoAdult"] . " + " . $row["NoChildren"] . " people </p>
		<h6><p class='w3-opacity'> Made booking on: <br>" . $row["date_book"] . " </p></h6>
		<p style='vertical-align:middle'><strong>" . $row["status"] . "</strong></p>";
		echo "<a href='CancelBooking.php?book_id=". $row["book_id"] ."' method='get'><button class='w3-right' style='background-color:#eee; color:red; padding:6px 8px;vertical-align:middle;'>Cancel My Booking </button></a></p><br>";
		echo "<br><br></div>";
			
			
		
		
	} 
} else {
    echo "0 results";
}



$conn->close();
?>

</div>
</div>

  <div class="w3-container w3-padding-32" id="Accepted">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Accepted</h3>

<div class="w3-row-padding">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_id = $user_id;

$sql = "SELECT book. * , hotel. * FROM book INNER JOIN hotel ON book.hotel_id = hotel.hotel_id WHERE book.user_id =' ". $user_id ." ' AND STATUS =  'accept'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		
			$start_ts = strtotime($row['CheckIn']);
			$end_ts   = strtotime($row['CheckOut']);
			$diff     = floor(($end_ts - $start_ts)/ (60*60*24));
			$price = $row['price'];
			$total = $diff * $price;
			$status = $row["status"];
			
			
		echo "<div class='w3-col l3 m6 w3-margin-bottom' style='border-style: ridge;'><br>";
		
?>

		<img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">

<?php

		echo "<br><h4><strong><a href='#'>". $row["namePlace"]. "</a></strong></h4>
		<p>Check In on:" . $row["CheckIn"] . " </p>
		<p>Check Out on: " . $row["CheckOut"] . " </p>
		<p>Booking for: ";
		echo $diff; echo " days";
		echo "<br><br><strong>Total to pay: RM ";
		echo $total; echo "</strong>";
		echo "<p>Booking for: " . $row["NoAdult"] . " + " . $row["NoChildren"] . " people </p>
		<h6><p class='w3-opacity'> Made booking on: <br>" . $row["date_book"] . " </p></h6>
		<p style='vertical-align:middle'><strong>" . $row["status"] . "</strong>";
		echo "<a href='acceptedView.php?book_id=". $row["book_id"] ."' method='get'><button class='w3-right' style='background-color:#eee; color:green; padding:6px 8px;vertical-align:middle;'>Proceed </button></a></p><br>";
		echo "</div>";
			
			
		
		
	} 
} else {
    echo "0 results";
}



$conn->close();
?>

</div>
</div>


<div class="w3-container w3-padding-32" id="Rejected">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Rejected</h3>

<div class="w3-row-padding">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_id = $user_id;


$sql = "SELECT book. * , hotel. * FROM book INNER JOIN hotel ON book.hotel_id = hotel.hotel_id WHERE book.user_id =' ". $user_id ." ' AND STATUS =  'reject'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		
			$start_ts = strtotime($row['CheckIn']);
			$end_ts   = strtotime($row['CheckOut']);
			$diff     = floor(($end_ts - $start_ts)/ (60*60*24));
			$price = $row['price'];
			$total = $diff * $price;
			$status = $row["status"];
			
		echo "<div class='w3-col l3 m6 w3-margin-bottom' style='border-style: ridge;'><br>";
		
?>

		<img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">

<?php

		echo "<br><h4><strong><a href='#'>". $row["namePlace"]. "</a></strong></h4>
		<p>Check In on:" . $row["CheckIn"] . " </p>
		<p>Check Out on: " . $row["CheckOut"] . " </p>
		<p>Booking for: ";
		echo $diff; echo " days";
		echo "<br><br><strong>Total to pay: RM ";
		echo $total; echo "</strong>";
		echo "<p>Booking for: " . $row["NoAdult"] . " + " . $row["NoChildren"] . " people </p>
		<h6><p class='w3-opacity'> Made booking on: <br>" . $row["date_book"] . " </p></h6>
		<p style='vertical-align:middle'><strong>" . $row["status"] . "</strong></p>";
		echo "</div>";
			
			
		
		
	} 
} else {
    echo "0 results";
}



$conn->close();
?>

</div>
</div>

</div>




</body>
</html>

<?php include 'include/footer.php'; ?>