<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">



<?php 
include 'include/header2.php';
include 'connect.php';
?>



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="/travel/view/leaflet-routing-machine-3.2.7/dist/leaflet-routing-machine.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCPWb_XFjYMkaMhU08I9b1UI0qgMv1855M",
    authDomain: "transportation-43691.firebaseapp.com",
    databaseURL: "https://transportation-43691.firebaseio.com",
    projectId: "transportation-43691",
    storageBucket: "transportation-43691.appspot.com",
    messagingSenderId: "841530811595"
  };
  firebase.initializeApp(config);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


<style>
	#mapContainer{
		position: absolute;
		top:0;
		right:0;
		bottom:0;
		left:0;
		height: 500px;
		width: 100%;
        margin: auto auto 0px auto

	}

	#form{
		margin: 600px auto auto 40%;

	}
</style>

<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>

</head>

<body>

<br><br><br><br><br>

<?php
    
    if(isset($_POST['form']))
    {
        $location = $_POST['location'];
        $destination = $_POST['destination'];
        

        
        $sqlL = "SELECT Latitude,Longitude from LanLong where SRegionName = '$location'";
        
        $sqlD = "SELECT Latitude,Longitude from LanLong where SRegionName = '$destination'";
        
        
        $resultL = mysqli_query($con, $sqlL);
        $resultD = mysqli_query($con, $sqlD);
        
        while($rowL = mysqli_fetch_assoc($resultL)){
            echo $rowL['SRegionName'];
            $latitude = $rowL['Latitude'];
            $longitude = $rowL['Longitude'];
        }
        
        
        while($rowD = mysqli_fetch_assoc($resultD)){
            echo $rowD['SRegionName'];
            $latitudeD = $rowD['Latitude'];
            $longitudeD = $rowD['Longitude'];
        }

    }
 else
    {
        
        $latitude = 3.128213;
        $longitude = 101.650695;
        $latitudeD = 3.128213;
        $longitudeD = 101.650695;
        
        //try to get the current location
    }
    
    ?>


<div id="mapContainer"></div>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="/travel/view/leaflet-routing-machine-3.2.7/dist/leaflet-routing-machine.js"></script>
<script>
//instatantite leaflet map

/*import L from 'leaflet';
import {
    GeoSearchControl,
    OpenStreetMapProvider,
} from 'leaflet-geosearch';

const provider = new OpenStreetMapProvider();

const searchControl = new GeoSearchControl({provider: provider,});

//const map = new L.Map('map');
map.addControl(searchControl);*/

    var latitude = '<?php echo $latitude;?>';
    var longitude = '<?php echo $longitude;?>';
    var latitudeD = '<?php echo $latitudeD;?>';
    var longitudeD = '<?php echo $longitudeD;?>';


var x = Number(latitude); var y = Number(longitude); var xD = Number(latitudeD); var yD = Number(longitudeD);
var corner1 = (x + xD)/2;
var corner2 = (y + yD)/2;
    
    var map = L.map('mapContainer', {
                    center: [corner1, corner2],
                    zoom: 7
                    });
    
    var layer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
                            maxZoom: 18, attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https:carto.com/attribution">CARTO</a>'
                            }).addTo(map);

var markerArray = [];

var marker1 = L.marker([latitude, longitude]).addTo(map)
.bindPopup('Location')

var marker2 = L.marker([latitudeD, longitudeD]).addTo(map)
.bindPopup('Destination')

markerArray.push(marker1);
markerArray.push(marker2);

var group = L.featureGroup(markerArray);
map.fitBounds(group.getBounds());

L.Routing.control({waypoints: [
                  L.latLng(latitude, longitude),
                  L.latLng(latitudeD, longitudeD)
                  ],
                  routeWhileDragging: true
                  }).addTo(map);

</script>

<br><br><br>


<form action="" id="form" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Location <input type="text" name="location"><br>
Destination: <input type="text" name="destination"><br>
Date of travelling:<input id="datepicker" name="date"/><br>
<input type="submit" name="form" value="GO">
</form>













<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
<?php include 'include/footer.php'; ?>
</html>

