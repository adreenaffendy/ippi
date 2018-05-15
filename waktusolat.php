
<?php
    session_start();
    include 'include/header2.php'; 
    include 'session.php';

	$_GET['name'];
?>

<html>
	<head>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>Waktu Solat</title>
		<!-- jQuery -->
		<script src="../assets/js/jquery.js"></script>
		<!-- core script function -->
		<script src="../assets/js/script.js"></script>
		<!-- Bootstrap script -->
		<script src="../assets/js/bootstrap.min.js"></script>
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
		<!-- design css -->
		<link rel="stylesheet" href="../assets/css/design.css"/>
	</head>
	<body>
		<div class="se-pre-con"></div> <!-- loading spinner -->
		<div class="booking-item-details">
			<div class="container">

		    	<div class="col-md-12">
			        <div class="tabbable booking-details-tabbable"><br><br>
			            <ul class="nav nav-tabs" id="myTab">
			                <li class="active">
			                	<a href="waktusolat.php?name=<?php echo $_SESSION['waktu']?>"  ><i class="fa fa-camera"></i>Prayer times</a>
			                </li>
			                <li>
			                	<a href="plan.php" ><i class="fa fa-map-marker"></i>Day by Day</a>
			                </li>
							<li>
								<a href="masjid.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Mosques Around You</a>
			                </li>
							<li>
								<a href="food.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Halal Foodstores</a>
			                </li>
							<li>
								<a href="TemplatePerak.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Accommodation</a>
			                </li>
			            </ul>
			            <div class="tab-content">
			                <div class="tab-pane fade in active" id="day">
			                    <div class="gap gap-small"></div>
			                    <center><h3>Prayer Times</h3></center>
			                    <div class="gap gap-small"></div>
				            </div>
				            <div class="se-pre-con"></div> <!-- loading spinner -->
								<center>

							<div class="row">
								<div class="col-md-6 center-block">
									<div class="panel panel-success">
							  			<div class="panel-heading"></div>
							  			<div class="panel-body">
											
											<input name='negeri' id='pilih_negeri' value='<?php echo $_GET['name'];?>' class='form-control' readonly='true'>
										
											<!-- pilih zone -->
											<select id='pilih_zone' name='pilih_zone' class="form-control">
												<option value=''>Pilih Zon</option>
											</select>
							  			</div>
									</div>
								</div>
							</div>
						
						<div class="row">
							<!-- append result here -->
							<div id="results"></div>
						</div>
								
							</center>
						</div>
			        </div>
			    </div>
			</div>
		</div>
	</body>
</html>

<?php include 'include/footer.php'; ?>