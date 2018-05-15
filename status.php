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


$sql = "SELECT book. * , hotel. * FROM book INNER JOIN hotel ON book.hotel_id = hotel.hotel_id WHERE hotel.user_id =' ". $user_id ." ' AND STATUS =  'pending'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		
			$start_ts = strtotime($row['CheckIn']);
			$end_ts   = strtotime($row['CheckOut']);
			$diff     = floor(($end_ts - $start_ts)/ (60*60*24));
			$price = $row['price'];
			$total = $diff * $price;
		
		echo "<div class='w3-col l3 m6 w3-margin-bottom' style='border-style: ridge;'><br>";
		
?>

		<img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">

<?php

		echo "<br><h4><strong><a href='#'>". $row["namePlace"]. "</a></strong></h4>
		<p>Check In on:" . $row["CheckIn"] . " </p>
		<p>Check Out on: " . $row["CheckOut"] . " </p>
		<p>Staying for: ";
		echo $diff; echo " days";
		echo "<br><br><strong>Total offered: RM ";
		echo $total; echo "</strong>";
		echo "<p>Booking for: " . $row["NoAdult"] . " + " . $row["NoChildren"] . " people </p>
		<h6><p class='w3-opacity'> Made booking on: <br>" . $row["date_book"] . " </p></h6>";

		echo"<p><a href='accept.php?book_id=". $row["book_id"]."' method='get'><button class='w3-left' style='background-color:#eee; color:green;vertical-align:middle;border-radius: 50%;'>Accept!</button></a>
		<a href='reject.php?book_id=". $row["book_id"]."' method='get'><button class='w3-right' style='background-color:#eee; color:red;vertical-align:middle;border-radius: 50%;'>Reject!</button></a></p></div>";
	} 
} else {
    echo "0 results";
}



$conn->close();
?>

</div>

</div>




</body>
</html>

<?php include 'include/footer.php'; ?>