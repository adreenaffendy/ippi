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
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;margin:0}
.mySlides {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
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
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
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
  .prev, .next,.text {font-size: 11px}
}
</style>


<body class>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:0;width:260px; height:100%;margin-top: 60px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">

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

    // output data of each row
    //while($row = $result->fetch_assoc()) {
        /*echo"<div class='w3-col l3 m6 w3-margin-bottom'>
              <img src='homestay/home2.jpg' alt='homestayJohor' style='width:100%;height:200px;' class='w3-hover-opacity'>";
        echo "<h4>- <a href='#'>". $row["namePlace"]. "</a></h4>";
        echo "<p class='w3-opacity'> RM" . $row["price"] . " / night</p>";
        echo "<p><a href='book.php?". $row["id"] ."'><button class='w3-btn-block' style='background-color: #FF5733'>BOOK !</button></a></p></div>";*/
        echo "<h5>" .$row["namePlace"]. "</h5>";
		echo "<h5>RM " .$row["price"]. "</h5><h6>per night</h6>";
		echo "<hr>
    <form action='book2.php?hotel_id=". $row["hotel_id"] ."' method='post'>
      <p><label> Check In</label></p>
      <input class='w3-input w3-border' type='date' name='CheckIn'>          
      <p><label> Check Out</label></p>
      <input class='w3-input w3-border' type='date' name='CheckOut'>         
      <p><label> Adults</label></p>
      <input class='w3-input w3-border' type='number' value='1' name='Adults' min='1' max='20'>              
      <p><label> Kids</label>
      <input class='w3-input w3-border' type='number' value='0' name='Kids' min='0' max='20'>
      <br><br><br><button class='w3-button w3-block w3-green' type='submit'> Make an offer</button></p>
    </form>
  </div>
</nav>";

echo"<!-- !PAGE CONTENT! -->
<div class='w3-main w3-white' style='margin-left:260px; margin-top: 70px;'>

  <!-- Push down content on small screens -->
  <div class='w3-hide-large' style='margin-top:80px'></div>

  <!-- Slideshow Header -->
  <div class='w3-container' id='apartment'>
    <h2 class='w3-text-green'>" .$row["namePlace"]. "</h2>
  </div>";
      
  
echo" <div class='w3-row-padding'>";
?>

<div class="slideshow-container">

<div class="mySlides">
  <div class="numbertext">1 / 4</div>
  <img src="<?php echo $row['image1']; ?>" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">2 / 4</div>
  <img src="<?php echo $row['image2']; ?>" style="width:100%">
</div>

<div class="mySlides">
  <div class="numbertext">3 / 4</div>
  <img src="<?php echo $row['image3']; ?>" style="width:100%">
</div>

<div class="mySlides">
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
	$conn->close();
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

</body>
</html>

<?php include 'include/footer.php'; ?>
