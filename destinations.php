<?php 
session_start();
include('include/header.php'); 
include 'session.php';

$id = $_GET['id'];

$dest = getDestionationByBenuaId($id);
$benua = getBenua($id);
?>

<div class="container">
            <ul class="breadcrumb">
                <li><a href="homepage.php">Home</a>
                </li>
                <li><?php echo $benua['name']; ?>
                </li>
            </ul>
           
          
            <div class="row">
                
                <div class="col-md-10">
                    
                    <ul class="booking-list">
                    	<?php
                    		for($i = 0; $i < count($dest); $i++) {
                    			$string = strip_tags($dest[$i]['des']);
								if (strlen($string) > 150) {

								    // truncate string
								    $stringCut = substr($string, 0, 150);

								    // make sure it ends in a word so assassinate doesn't become ass...
								    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
								}
								
                    	?>
                        <li>
                            <a class="booking-item" href="details.php?id=<?php echo $dest[$i]['destination_id']?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../assets/img/<?php echo $dest[$i]['img']?>" alt="Image Alternative text"/>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="booking-item-rating">
                                            <ul class="icon-group booking-item-rating-stars">
                                                <li><i class="fa fa-star"></i>
                                                </li>
                                                <li><i class="fa fa-star"></i>
                                                </li>
                                                <li><i class="fa fa-star"></i>
                                                </li>
                                                <li><i class="fa fa-star"></i>
                                                </li>
                                                <li><i class="fa fa-star-o"></i>
                                                </li>
                                            </ul><span class="booking-item-rating-number"><b >3.9</b> of 5</span><small>(668 reviews)</small>
                                        </div>
                                       
                                        <p class="booking-item-address"><i class="fa fa-map-marker"></i> <?php echo $dest[$i]['short_description']?></p>

                                        <p class="booking-item-description"><?php echo $string; ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="booking-item-price">RM<?php echo $dest[$i]['price']?></span>
                                        <span>/person</span>
                                            <span class="btn btn-primary">Book now</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php }; ?>
                    </ul>
         
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
<?php include 'include/footer.php'; ?>