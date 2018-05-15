<?php 
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta  name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title>AutoTour Module</title>
<!--    
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="assets/mainCSS.css">
    <link href="https://fonts.googleapis.com/css?family=Domine" rel="stylesheet">
-->
<!--<style type="text/css">

    .container {
        background-image: url("assets/Images/indonesiaBG.jpg");
        background-attachment: fixed;
        background-color: grey;
        background-blend-mode: screen;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        content: border-box;
        
    }

    /* This is the Gallery responsive CSS */
    div.img {
        padding: 10px;
}

div.img:hover {
    box-shadow: 10px 10px 5px #000000;
    background-color: white;
}

div.img img {
    width: 100%;
    height: auto;
    margin-left: -10px;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
 
.buttoncik {
    border-radius: 12px;
    position: relative;
    background-color: #4CAF50;
    border: none;
    font-size: 18px;
    color: #FFFFFF;
    padding: 20px;
    width: 200px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.buttoncik:hover {
     background-color: white;
     color: #4CAF50;
     
}

.buttoncik:after {
    content: "";
    background: #90EE90;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.buttoncik:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}


</style>
-->
</head>
<body>

<div class="container">
    <br><br>
    <center><h1 class="title">AUTO TOUR</h1></center>


<div style="background-color: white; max-width: 1000px; margin-left: auto; margin-right: auto;">
<!--<div class="responsive" >-->
<br><br>
  <h3>Welcome to AutoTour! Let us be your personal tour guide while you backpack, anywhere.</h3>
</div>
<br><br>
<div style="background-color: white; max-width: 500px; margin-left: auto; margin-right: auto;">
  <center><h4>Click the button below and then click "Allow" to allow us track your position.</h4></center>
  <p><p>
</div>

<!--Ini GEOLOCATION-->
<br><br>
<center>
<button class="buttoncik" onclick="getLocation()">Get my location!</button>
</center>

<p id="demo"></p>

<script>

//get user location
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}


var x = document.getElementById("demo");

//error handling
function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

//display in map

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;
    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=400x300&key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU";
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}
//To use this code on your website, get a free API key from Google.
//Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp

</script>

</body>
</html>