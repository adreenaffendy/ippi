<?php 
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta  name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>Choose AutoTour Category</title>
	<!--<link rel="stylesheet" href="assets/w3.css">-->

<!--<style type="text/css">

	#div1 {
		position: relative;
		background-image: url(assets/Images/tourGuide.jpg);
		-webkit-filter:brightness(100%);
		transition-timing-function: ease-out;
		background-size: 100% 100%;
		min-height: 300px;
		text-shadow: 1px 1px 2px #000000;
	}

	#div1:hover {
		-webkit-filter:brightness(70%);
		-webkit-transition: all 0.5s ease;
        /*-moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;*/
        transition: all 0.5s ease;
	}

	#div2 {		
		background-image: url(assets/Images/audioTour.jpg);
		-webkit-filter:brightness(100%);
		transition-timing-function: ease-out;
		background-size: 100% 100%;
		min-height: 300px;
		text-shadow: 1px 1px 2px #000000;
	}

	#div2:hover {
		-webkit-filter:brightness(70%);
		-webkit-transition: all 0.5s ease;
        /*-moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -ms-transition: all 0.5s ease;*/
        transition: all 0.5s ease;
	}


</style>!-->

</head>
<body>

<div class="container">
	
<div class="row" style="max-width: 1000px; margin-left: auto; margin-right: auto;">

	<br><br>

	  <div class="col-6" id="div1">
	  <a class="photo1" href="<?php echo base_url('LocalTour');?>"><h1 style="font-weight: 900;"><br>LOCAL TOUR GUIDE</h1>
	  <h4 style="font-weight: 900;">Need expert opinion? Hire from a list of available local tour guides to accompany you for a taste of local perspective.</h4></a>
	  </div>
	   
	  <div class="col-6" id="div2">
	    <a href="<?php echo base_url('AutoTour');?>"><h1 style="font-weight: 900;"><br>AUDIO TOUR GUIDE</h1><h4 style="font-weight: 900;">Want some privacy in your travels? Select this category for recorded audio tour guides. Just you, the world, and nobody else.</h4></a>
	  </div>

	 	
</div>
<br>
</div>


</body>
</html>

<?php include 'include/footer.php'; ?>