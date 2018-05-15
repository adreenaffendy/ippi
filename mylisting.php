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

$sql = "SELECT * FROM  `hotel` WHERE user_id =' ". $user_id . " '";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo"<div class='w3-col l3 m6 w3-margin-bottom'>";
?>
              <img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">
              
<?php
        echo "<h4>- <a href='#'>". $row["namePlace"] ."</a></h4>";
        echo "<p class='w3-opacity'> RM" . $row["price"] . " / night</p>";
        echo "<p><a href='myHotel.php?hotel_id=". $row["hotel_id"] ."' method='get'><button class='w3-btn-block' style='background-color:#eee; color:green; padding:6px 16px;vertical-align:middle;'>View</button></a></p></div>";
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