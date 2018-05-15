<?php 
include 'include/header2.php'; 
include 'session.php';
//require 'connect.php';

?> 

<!DOCTYPE html>
<html>
<title>Areen Travel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="copycss.css"><link rel="font.txt">
<link rel="stylesheet" href="cloud.txt">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides

* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

</style>


<body class>


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

$result = mysqli_query($conn, "SELECT * FROM hotel WHERE hotel_id=' ". $hotel_id ." '");


//$sql = "SELECT * FROM hotel WHERE id =  '$id'"; 
//$result = $conn->query($sql);

  while($row = mysqli_fetch_assoc($result)){
	$extras1 = $row["extras"];
	$extras = explode(',', $extras1);


echo"<!-- !PAGE CONTENT! -->
<div class='w3-main w3-white' style='margin-top: 70px;'>

  <!-- Push down content on small screens -->
  <div class='w3-hide-large' style='margin-top:80px'></div>

  <!-- Slideshow Header -->
  <div class='w3-container' id='apartment'>
    <h2 class='w3-text-green'>" .$row["namePlace"]. "</h2>
  </div>";
      
  
echo" <div class='w3-row-padding'>";
?>

<div class="slideshow-container">

<div class="mySlides" style="text-align:center">
  <div class="numbertext">1 / 4</div>
  <img src="<?php echo $row['image1']; ?>" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides" style="text-align:center">
  <div class="numbertext">2 / 4</div>
  <img src="<?php echo $row['image2']; ?>" style="width:100%">
</div>

<div class="mySlides" style="text-align:center">
  <div class="numbertext">3 / 4</div>
  <img src="<?php echo $row['image3']; ?>" style="width:100%">
</div>

<div class="mySlides" style="text-align:center">
  <div class="numbertext">4 / 4</div>
  <img src="<?php echo $row['image4']; ?>" style="width:100%">
</div>


<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>
  


  <?php

    echo" <div class='w3-container'>
    <h4><strong>Space details</strong></h4>
    <div class='w3-row w3-large'>
      <div class='w3-col s6'>
	    <p><i class='fa fa-home' style='font-size:24px'></i></i> Type of Accommodation:" .$row["type"]. "</p>
        <p><i class='fa fa-fw fa-male'></i> Max people:" .$row["guest"]. "</p>
        <p><i class='fa fa-fw fa-bed'></i> Bed:" .$row["bed"]. "</p>
      </div>";
	  
    echo" <div class='w3-col s6'>
        <p><i class='fa fa-hourglass-start' style='font-size:24px'></i> Check In: After " .$row["checkIn"]. "</p>
        <p><i class='fa fa-hourglass' style='font-size:24px'></i> Check Out: Before " .$row["checkOut"]. "</p>
      </div>
    </div>
    <hr>";
	

	
	echo"<h4><strong>Address</strong></h4>
    <p><i class='fa fa-map-marker' style='font-size:24px'></i>    ".$row["address"]. "</p>
    <hr>";
	
     echo"<h4><strong>Facilitiess</strong></h4>
    <div class='w3-row w3-large'>
      <div class='w3-col s6'>";
	  foreach($extras as $key => $extra){
		  echo"<i class='fa fa-plug'></i>  " ,$extra, "<br>";
	  }
      echo"</div>
    </div>
    <hr>";
	    
    echo"<h4><strong>Rules</strong></h4>
		<p><i class='fa fa-flash' style='font-size:24px'></i>     ".$row["rules1"]."
		<p><i class='fa fa-flash' style='font-size:24px'></i>     ".$row["rules2"]."
		<p><i class='fa fa-flash' style='font-size:24px'></i>     ".$row["rules3"]."
		<p><i class='fa fa-flash' style='font-size:24px'></i>     ".$row["rules4"]."
		<p><i class='fa fa-flash' style='font-size:24px'></i>     ".$row["rules5"]."
  </div>
  <hr>";
    	    }
			
?>





<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


<div class="w3-container w3-center" id="delete">
  <p>
    <button onclick="document.getElementById('id01').style.display='block'" style="background-color:#eee; color:red;vertical-align:middle;padding:8px 60px">Delete</button>
  </p>
</div>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
    <div class="w3-container w3-white w3-center">
      <h1 class="w3-wide">You're about to delete your own listing space.</h1>
      <p>Are you sure?</p>
			
      <div class="w3-row">
        <div class="w3-half">
          <?php echo "<a href='deleteListing.php?hotel_id=". $hotel_id."' method='get'>";?><button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-red" style="padding:8px 60px">Yes!</button></a>
        </div>
        <div class="w3-half">
          <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-green" value="Reset" style="padding:8px 60px">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
	$conn->close();
?>


</body>
</html>

<?php include 'include/footer.php'; ?>
