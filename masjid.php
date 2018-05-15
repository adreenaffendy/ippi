<?php 
    session_start();
    include 'include/header2.php'; 
    include 'session.php';
	
	$name_mosque = $_GET['name'];

    // $pieces = explode(",", $_POST['destination_id']);
    $sql = "select *,a.image as image,a.description as plan_description 
            from mosque a join destination b on a.destination = b.destination_id";

    $mysql = mysqli_query($con, $sql);
?>
    <div class="gap gap-small"></div>
        <div class="container">
            <div class="booking-item-details">
               
                    <div class="col-md-12">
                        <div class="tabbable booking-details-tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li ><a href="waktusolat.php?name=<?php echo $_SESSION['waktu']?>"  ><i class="fa fa-camera"></i>Prayer times</a>
                                </li>
                                <li><a href="plan.php" ><i class="fa fa-map-marker"></i>Day by Day</a>
                                </li>
								<li class="active"><a href="masjid.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Mosques Around You</a>
                                </li>
								<li><a href="food.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Halal Foodstores</a>
                                </li>
								<li><a href="TemplatePerak.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Accommodation</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade " id="route">

                                </div>
                                <div class="tab-pane fade in active" id="day">
                                    <div class="gap gap-small"></div>
                                    <center><h3>Mosques Around The Area</h3></center>
                                    <div class="gap gap-small"></div>
                                     <?php 
						$sql = "select *,a.image as image,a.short_description as short_description, a.description as description 
								from mosque a join destination b on a.destination_id = b.destination_id 
								WHERE b.name = '$name_mosque'";
								
						$query = mysqli_query(connect(), $sql);
							while($mosque = mysqli_fetch_array($query)){
						?>
						<div class="col-md-4">
							<div class="thumb">
								<header class="thumb-header">
									<a class="hover-img" href="masjiddetails.php?id=<?php echo $mosque['mos_id']?>">
										<img src="../assets/img/<?php echo $mosque['image']?>" style="width:400px; height:250px;" alt=""/>
										<h5 class="hover-title-center">View More</h5>
									</a>
								</header>
								<div class="thumb-caption">
									<ul class="icon-group text-tiny text-color">
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star-half-empty"></i>
										</li>
									</ul>
									<h5 class="thumb-title"><a class="text-darken" href="#"><?php echo $mosque['title']?></a></h5>
									<p class="mb0"><small><i class="fa fa-map-marker"></i> <?php echo $mosque['short_description']?></small>
									</p>
								   
									<p>
										<a href="masjiddetails.php?id=<?php echo $mosque['mos_id']?>"><button class="btn btn-primary " style="width:100%">View</button></a>
									</p>
								</div>
							</div>
						</div>
						<?php }  ?>
                                </div>
                                <div class="tab-pane fade" id="stay">
                                </div>
                                <div class="tab-pane fade" id="travel">
                                </div>

                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
            <div class="gap"></div>
            <div class="gap gap-small"></div>
        </div>
		
		<script>
function goBack() {
    window.history.back();
}
</script>
        <?php include 'include/footer.php'; ?>