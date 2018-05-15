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

 <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h6 class="w3-border-bottom w3-border-light-grey w3-padding-12">This feature is dedicated to women</h6>
  </div>

<div class="w3-row-padding" style="background-color: #ffcccc">

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

$sql = "SELECT * FROM  `hotel` WHERE gender =  'Female'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
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
    <!--<div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-bottomright w3-black w3-padding">" .$row["name"]. "</div>
        <img src="legoland.jpg" alt="Balkan" style="width:100%; height:200px;" class="w3-hover-opacity">
      </div>-->
    </div>

<!-- End page content -->
</div>




</body>
</html>

<?php include 'include/footer.php'; ?>
