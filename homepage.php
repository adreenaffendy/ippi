<?php 
session_start();
include('include/header2.php'); 
include('include/top_area.php');
include('session.php');

unset($_SESSION['start_date']);
unset($_SESSION['end_date']);
unset($_SESSION['destination_id']);
unset($_SESSION['place']);
unset($_SESSION['destination']);

?>

<center><b>Hello <?php echo $login_session; ?>!</b></center>


<div class="container">
            <div class="row row-wrap" data-gutter="60">
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header">
                        	 <i class="fa fa-location-arrow box-icon-large box-icon-center box-icon-info box-icon-to-success animate-icon-top-to-bottom round"></i>	
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title text-center"><a class="text-darken" href="#"><b>Get a personalized plan</b></a></h5>
                            <p class="thumb-desc text-center">A complete day-by-day itinerary based on your preference</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header"><i class="fa fa-calendar box-icon-large box-icon-center box-icon-info box-icon-to-success animate-icon-top-to-bottom round"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title text-center"><a class="text-darken" href="#"><b>Customize it</b></a></h5>
                            <p class="thumb-desc text-center">Refine your plan. We'll find the best routes and schedules</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header"><i class="fa  fa-plane box-icon-large box-icon-center box-icon-info box-icon-to-success animate-icon-top-to-bottom round"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title text-center"><a class="text-darken" href="#"><b>Book it</b></a></h5>
                            <p class="thumb-desc text-center">Choose from the best hotels and activities. Up to 50% off</p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="thumb">
                        <header class="thumb-header"><i class="fa fa-edit box-icon-large box-icon-center box-icon-info box-icon-to-success animate-icon-top-to-bottom round"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title text-center"><a class="text-darken" href="#"><b>Manage it</b></a></h5>
                            <p class="thumb-desc text-center">Everything in one place. Everyone on the same page.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>
       
        <div class="container">
            <div class="gap"></div>
            <h2 class="text-center">Promotions!</h2>
            <div class="gap">
            	<div class="row row-wrap">
            		<?php 
                		$dest = getTopDestinations();
						for($i = 0; $i < count($dest); $i++) {
                            // var_dump($dest[$i]);
                	?>
                        <div class="col-md-3">
                            <div class="thumb">
                                <header class="thumb-header">
                                    <a class="hover-img" href="details.php?id=<?php echo $dest[$i]['destination_id']?>">
                                        <img src="../assets/img/<?php echo $dest[$i]['image']?>" alt="Image Alternative text"/>
                                        <h5 class="hover-title-center">Book Now</h5>
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
                                    <h5 class="thumb-title"><a class="text-darken" href="#"><?php echo $dest[$i]['name']?></a></h5>
                                    <p class="mb0"><small><i class="fa fa-map-marker"></i> <?php echo $dest[$i]['short_description']?></small>
                                    </p>
                                   <p class="mb0 text-darken"><span class="text-lg lh1em text-color">RM<?php echo $dest[$i]['price']?></span>  <small> /person</small>
                                    </p>
                                    <p>
                                    	<a href="details.php?id=<?php echo $dest[$i]['destination_id']?>"><button class="btn btn-primary " style="width:100%">Book Now</button></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php }  ?>
                        
                    </div>
            </div>
        </div>
        <!--<div class="container">
            <div class="gap"></div>
            <h2 class="text-center">Choose Your Destinations</h2>
            <div class="gap">
                <div class="row row-wrap">

                	<?php 
                	$benua = getAllBenua();
					for($i = 0; $i < count($benua); $i++) {
                	?>

                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="destinations.php?id=<?php echo $benua[$i][id]?>">
                                    <img src="../assets/img/<?php echo $benua[$i][image]?>" alt="Image Alternative text"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><?php echo $benua[$i][name]?></h4>
                            </div>
                        </div>
                    </div>

                    <?php }; ?>
                </div>-->
               
            </div>
        </div>
<?php include 'include/footer.php'; ?>
