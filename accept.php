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

$book_id = $_GET["book_id"];
$sql = "UPDATE  travel_agency.book SET  status =  'accept' WHERE  book.book_id =' ". $book_id ." '";
$result = $conn->query($sql);


?>
<?php include 'status.php'; ?>
