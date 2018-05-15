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

$hotel_id = $_GET["hotel_id"];
$sql = "DELETE FROM travel_agency.hotel WHERE hotel.hotel_id =' ". $hotel_id ." '";
$result = $conn->query($sql);


?>
<?php include 'mylisting.php'; ?> 
