
<?php 
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';

?> 

<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link rel="stylesheet" href="assets/css/ayeen/copycss.css">
<title>Areen Travel</title>


<!-- CSS -->
<style>
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 40em;
padding: 1em;
border: 1px solid #ccc;
margin: auto;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm input[type="text"],
.myForm input[type="Phone"],
.myForm input[type="number"],
.myForm input[type="Address"],
.myForm select,
.myForm textarea {
display: block;
width: 100%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-top: 1em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
}

.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}

#content {
overflow: scroll;
}
</style>



</head>

<body>


<!-- Navbar (sit on top)
<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="index.php" class="w3-margin-left"><b>TH</b> Travel</a>
    </li>
    
</ul>
</div> -->


<form class="myForm" method="post" action="listing.php" enctype="multipart/form-data">


<h3><strong>START LISTING YOUR PLACE!</strong></h3>
<br>
<p>
<label>Name
<input type="text" name="namePlace" placeholder="Name your listing" required>
</label> 
</p>
<br><br>
<p>
<label>Type of accomodation
<select id="type" name="type" required>
<option value="" selected="selected">Select One</option>
<option value="Homestay" >Homestay</option>
<option value="Room" >Room</option>
<option value="Budget Hotel" >Budget Hotel</option>
</select>
</label> 
</p>
<br><br>
<p>
<label>State
<select id="state" name="name" required>
<option value="" selected="selected">Select One</option>
<option value="Kuala Lumpur" >Kuala Lumpur</option>
<option value="Kuala Terengganu" >Terengganu</option>
<option value="Kelantan" >Kelantan</option>
<option value="Perak" >Perak</option>
<option value="Kedah" >Kedah</option>
<option value="Johor Bahru" >Johor</option>
</select>
</label> 
</p>
<br><br>
<p>
<label>Address
<textarea id="address" name="address" maxlength="500"></textarea>
</label> 
</p>

<br><br>
<fieldset>
<legend>Prefer Gender for Guest</legend>
<p><label class="choice"> <input type="radio" id="gender" name="gender" required value="Anyone"> Anyone </label></p>
<p><label class="choice"> <input type="radio" id="gender" name="gender" required value="Female"> Female </label></p>
</fieldset>

<br><br>
<p>
<label>Phone 
<input addresstype="Phone" id="phone" name="phone" required>
</label>
</p>
<br><br>
<p>
<label>Price per night 
RM: <input type="number" id="price" name="price" required>
</label>
</p>
<br><br>
<p><label> Check In</label></p>
<input class='w3-input w3-border' type='time' name='CheckIn'>         
<p><label> Check Out</label></p>
<input class='w3-input w3-border' type='time' name='CheckOut'>         
<p>
<br><br>
<label>Max guest
<input type="number" id="guest" name="guest" required>
</label>
</p>
<br><br>
<p>
<label>Rules
<textarea id="rules1" name="rules1" maxlength="100"></textarea><br>
<textarea id="rules2" name="rules2" maxlength="100"></textarea><br>
<textarea id="rules3" name="rules3" maxlength="100"></textarea><br>
<textarea id="rules4" name="rules4" maxlength="100"></textarea><br>
<textarea id="rules5" name="rules5" maxlength="100"></textarea><br>
</label>
</p>

__________________________________

<fieldset>
<legend>Bed</legend>
<p><textarea id="bed" name="bed" maxlength="500"></textarea></p>
</fieldset>

<br><br>

<fieldset>
<legend>Extras</legend>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Wifi"> Wifi </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="TV"> TV </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="WashingMachine"> Washing Machine </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Pool"> Pool </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Kiblat"> Kiblat </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Prayer Room"> Prayer Room </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Prayer Mat"> Prayer Mat </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Telekung (For lady)"> Telekung (For lady) </label></p>
<p><label class="choice"> <input type="checkbox" name="extras[]" value="Call Service for Prayer Time"> Call Service for Prayer Time </label></p>
</fieldset>
<br><br>	


__________________________________
<fieldset>
<h6><legend>Pictures of your awesome listing.</legend></h6>
<input type="hidden" name="size" value="1000000">
<div>
	<input type="file" name="image1">
</div>
<br>
<input type="hidden" name="size" value="1000000">
<div>
	<input type="file" name="image2">
</div>
<br>
<input type="hidden" name="size" value="1000000">
<div>
	<input type="file" name="image3">
</div>
<br>
<input type="hidden" name="size" value="1000000">
<div>
	<input type="file" name="image4">
</div>
</fieldset>
<br><br>	
<!--<fieldset>
<h4><legend>Include special package</legend></h4>
<br>
<div class="popup" onclick="myFunction()"><u style="color:grey">What is special package? Click</u>
  <span class="popuptext" id="myPopup">Special package is an additional service that you as a host provide. It can be shopping together at local pasar, going to the beach or learn how to cook certain food to make their travel more memorable.  </span>


<p><label class="choice"> <input type="radio" name="package" required value="yes"> Yes </label></p>
<p><label class="choice"> <input type="radio" name="package" required value="no"> No </label></p>
</fieldset>
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
-->


<!-- RSVP modal 
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
    <div class="w3-container w3-white w3-center">
      <h1 class="w3-wide">Congratulations</h1>
      <p>You just listed you space for rent.</p>
      <div class="w3-row">
        <div class="w3-half">
          <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-green">View My Listing</button>
        </div>
        <div class="w3-half">
          <a href="index.php"><button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-red">Back to Home Page</button></a>
        </div>
      </div>
    </div>
  </div>
</div>-->


<p><button style="color:green" type="submit">Submit</button>				
<button style="color:red;margin: 0 100px;" type="reset">Cancel</button></p>

</form>

</body>
</html>

<?php include 'include/footer.php'; ?>