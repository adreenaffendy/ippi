<?php
include 'include/header2.php'; 
include 'session.php';
include 'connect.php';
?>


<!DOCTYPE html>
<html>
<title>Areen Travel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/ayeen/copycss.css">
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
<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

 <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Accomodation</h3>
  </div>
  
  <p style="margin-left:100px"><i class="fa fa-map-signs" style="font-size:24px"></i><a href="#Room">&nbsp; Room</a></p>
  <p style="margin-left:100px"><i class="fa fa-map-signs" style="font-size:24px"></i><a href="#Budget Hotel">&nbsp;Budget Hotel</a></p>
  <p style="margin-left:100px"><i class="fa fa-map-signs" style="font-size:24px"></i><a href="#Homestay">&nbsp;Homestay</a></p>


  <div class="w3-container w3-padding-32" id="Room">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Room</h3>
  


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

$sql = "SELECT * FROM  hotel WHERE type =  'Room'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<div class='w3-row-padding'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo"<div class='w3-col l3 m6 w3-margin-bottom'>";
?>
              
        <img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">
        
<?php
    echo "<h4>- <a href='#'>". $row["namePlace"]. "</a></h4>";
        echo "<p class='w3-opacity'> RM" . $row["price"] . " / night</p>";
        echo "<p><a href='book.php?hotel_id=". $row["hotel_id"] ."' method='get'><button class='w3-btn-block' style='background-color:#eee; color:green; padding:6px 16px;vertical-align:middle;'>BOOK !</button></a></p></div>";
    }echo "</div>";
} else {
    echo "0 results";
}



$conn->close();
?> 
</div>

  <div class="w3-container w3-padding-32" id="Budget Hotel">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Budget Hotel</h3>


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

$sql = "SELECT * FROM  `hotel` WHERE TYPE =  'Budget Hotel'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<div class='w3-row-padding'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo"<div class='w3-col l3 m6 w3-margin-bottom'>";
?>
              
        <img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">
        
<?php
    echo "<h4>- <a href='#'>". $row["namePlace"]. "</a></h4>";
        echo "<p class='w3-opacity'> RM" . $row["price"] . " / night</p>";
        echo "<p><a href='book.php?hotel_id=". $row["hotel_id"] ."' method='get'><button class='w3-btn-block' style='background-color:#eee; color:green; padding:6px 16px;vertical-align:middle;'>BOOK !</button></a></p></div>";
    }echo "</div>";
} else {
    echo "0 results";
}



$conn->close();
?>
  </div>
  
  <div class="w3-container w3-padding-32" id="Homestay">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Homestay</h3>


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

$sql = "SELECT * FROM  `hotel` WHERE TYPE =  'Homestay'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<div class='w3-row-padding'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo"<div class='w3-col l3 m6 w3-margin-bottom'>";
?>
              
        <img src="<?php echo $row['image1']; ?>" alt="homestayJohor" style="width:100%;height:200px;" class="w3-hover-opacity">
        
<?php
    echo "<h4>- <a href='#'>". $row["namePlace"]. "</a></h4>";
        echo "<p class='w3-opacity'> RM" . $row["price"] . " / night</p>";
        echo "<p><a href='book.php?hotel_id=". $row["hotel_id"] ."' method='get'><button class='w3-btn-block' style='background-color:#eee; color:green; padding:6px 16px;vertical-align:middle;'>BOOK !</button></a></p></div>";
    }echo "</div>";
} else {
    echo "0 results";
}



$conn->close();
?>
  </div>

<!-- End page content -->

</div>

<?php include 'include/footer.php'; ?>