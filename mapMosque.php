<!DOCTYPE html>

<html>
<head>
    
    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <!--Leaflet CSS file -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>

    <!--Leaflet JavaScript file -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
    integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
    crossorigin=""></script>


    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #map {
            width: 600px;
            height: 400px;
        }
    </style>

    <style>body { padding: 0; margin: 0; } #map { height: 100%; width: 100vw; }</style>
</head>
<body>

<div class="container">

<div style="background-color: white; max-width: 2000px; margin-left: auto; margin-right: auto;">
<!--<div class="responsive" >-->
    </div>


</div>

<div id='map'></div>

<script>
    var map = L.map('map').fitWorld();


    //ni marker utk klBirdPark
   var masjidNegara = L.marker([3.141944, 101.691667]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Negara");
        masjidNegara.on('mouseover', function (e) {this.openPopup();});
        masjidNegara.on('mouseout', function (e) {this.closePopup();});
        
    //ni marker utk klcc
    var masjidJamek = L.marker([3.148906, 101.695961]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Jamek");
        masjidJamek.on('mouseover', function (e) {this.openPopup();});
        masjidJamek.on('mouseout', function (e) {this.closePopup();});

        var masjidWilayah = L.marker([3.171944, 101.671111]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Wilayah");
        masjidWilayah.on('mouseover', function (e) {this.openPopup();});
        masjidWilayah.on('mouseout', function (e) {this.closePopup();});

         var masjidAsSyakirin = L.marker([3.157222, 101.716111]).addTo(map).on('click', onMarkerClick).bindPopup("As Syakirin Mosque");
        masjidAsSyakirin.on('mouseover', function (e) {this.openPopup();});
        masjidAsSyakirin.on('mouseout', function (e) {this.closePopup();});

        var masjidAlTaqwa = L.marker([3.146111, 101.629722]).addTo(map).on('click', onMarkerClick).bindPopup("Al Taqwa Mosque");
        masjidAlTaqwa.on('mouseover', function (e) {this.openPopup();});
        masjidAlTaqwa.on('mouseout', function (e) {this.closePopup();});

        var masjidSubang = L.marker([3.1199, 101.5644]).addTo(map).on('click', onMarkerClick).bindPopup("Subang Airport Mosque");
        masjidSubang.on('mouseover', function (e) {this.openPopup();});
        masjidSubang.on('mouseout', function (e) {this.closePopup();});


         var masjidRahman = L.marker([3.1201, 101.6545]).addTo(map).on('click', onMarkerClick).bindPopup("Ar-Rahman Mosque");
        masjidRahman.on('mouseover', function (e) {this.openPopup();});
        masjidRahman.on('mouseout', function (e) {this.closePopup();});

        var masjidUmar = L.marker([3.150207, 101.655101]).addTo(map).on('click', onMarkerClick).bindPopup("Saidina Umar Al Khattab Mosque");
        masjidUmar.on('mouseover', function (e) {this.openPopup();});
        masjidUmar.on('mouseout', function (e) {this.closePopup();});

 var masjidKhaldun = L.marker([3.0641, 101.7093]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Jamek Ibnu Khaldun");
        masjidKhaldun.on('mouseover', function (e) {this.openPopup();});
        masjidKhaldun.on('mouseout', function (e) {this.closePopup();});

        var masjidSamad = L.marker([2.7309, 101.7158]).addTo(map).on('click', onMarkerClick).bindPopup("Sultan Abdul Samad Mosque");
        masjidSamad.on('mouseover', function (e) {this.openPopup();});
        masjidSamad.on('mouseout', function (e) {this.closePopup();});

 var masjidZaid = L.marker([3.2112, 101.7056]).addTo(map).on('click', onMarkerClick).bindPopup("Zaid bin Haritsah Mosque");
        masjidZaid.on('mouseover', function (e) {this.openPopup();});
        masjidZaid.on('mouseout', function (e) {this.closePopup();});

 var masjidRahmanAuf = L.marker([3.079367, 101.66557]).addTo(map).on('click', onMarkerClick).bindPopup("Abdul Rahman Auf Mosque");
        masjidRahmanAuf.on('mouseover', function (e) {this.openPopup();});
        masjidRahmanAuf.on('mouseout', function (e) {this.closePopup();});

        var masjidShafie = L.marker([3.1337, 101.7306]).addTo(map).on('click', onMarkerClick).bindPopup("Al-Imam al-Shafie Mosque");
        masjidShafie.on('mouseover', function (e) {this.openPopup();});
        masjidShafie.on('mouseout', function (e) {this.closePopup();});

       var masjidBukitAman = L.marker([3.1475, 101.6885]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Bukit Aman");
        masjidBukitAman.on('mouseover', function (e) {this.openPopup();});
        masjidBukitAman.on('mouseout', function (e) {this.closePopup();}); 
 
 var masjidAlAkram = L.marker([3.1475, 101.6885]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Al Akram");
        masjidAlAkram.on('mouseover', function (e) {this.openPopup();});
         masjidAlAkram.on('mouseout', function (e) {this.closePopup();}); 

var masjidAzzubair = L.marker([3.1138, 101.7201]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Az-zubair Ibnu Awwam");
        masjidAzzubair.on('mouseover', function (e) {this.openPopup();});
        masjidAzzubair.on('mouseout', function (e) {this.closePopup();});

 var masjidAbuBakar = L.marker([3.1295, 101.6721]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Saidina Abu Bakar As-siddiq");
        masjidAbuBakar.on('mouseover', function (e) {this.openPopup();});
        masjidAbuBakar.on('mouseout', function (e) {this.closePopup();});

        var masjidFirdaus = L.marker([3.1884, 101.6690]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Al-firdaus");
        masjidFirdaus.on('mouseover', function (e) {this.openPopup();});
        masjidFirdaus.on('mouseout', function (e) {this.closePopup();});

       var masjidIndia = L.marker([3.1516, 101.6965]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid India");
        masjidIndia.on('mouseover', function (e) {this.openPopup();});
        masjidIndia.on('mouseout', function (e) {this.closePopup();}); 
 
 var masjidAnas = L.marker([3.183333, 101.65]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Anas Bin Malik");
        masjidAnas.on('mouseover', function (e) {this.openPopup();});
         masjidAnas.on('mouseout', function (e) {this.closePopup();}); 


var masjidJamekP = L.marker([3.0684, 101.6856]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Jamek Bandar Baru Seri Petaling");
        masjidJamekP.on('mouseover', function (e) {this.openPopup();});
        masjidJamekP.on('mouseout', function (e) {this.closePopup();});

        var masjidSalahuddin = L.marker([3.2225, 101.7202]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Salahuddin Al-ayyubi");
        masjidSalahuddin.on('mouseover', function (e) {this.openPopup();});
        masjidSalahuddin.on('mouseout', function (e) {this.closePopup();});

       var masjidMuadz = L.marker([3.1784, 101.7379]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Muadz Bin Jabal");
        masjidMuadz.on('mouseover', function (e) {this.openPopup();});
        masjidMuadz.on('mouseout', function (e) {this.closePopup();}); 
 
 var masjidAbu = L.marker([3.2017, 101.6713]).addTo(map).on('click', onMarkerClick).bindPopup("Masjid Abu Hurairah");
        masjidAbu.on('mouseover', function (e) {this.openPopup();});
         masjidAbu.on('mouseout', function (e) {this.closePopup();}); 

    //Ni utk popup message kat atas markers
    var popup = L.popup();

    //Ni fucntion kalo click marker
    function onMarkerClick() {
        var ask = window.confirm("Do you want to know further details about this mosque?");
        if (ask) {
            window.history.back();

        }
    }

    //map drp leaflet
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);

    function onLocationFound(e) {
        var radius = e.accuracy / 2;

        L.marker(e.latlng).addTo(map)
            .bindPopup("You are within " + radius + " meters from this point.").openPopup();

        L.circle(e.latlng, radius).addTo(map);
    }

    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    map.locate({setView: true, maxZoom: 16});
</script>


</body>
</html>

