<?php 
session_start();
include('include/header2.php'); 
include('session.php');

$id = $_GET['id'];

$dest = getDestination($id);
?>
 <div class="container">
            <ul class="breadcrumb">
                <li><a href="homepage.php">Home</a>
                </li>
                <li><a href="destinations.php?id=<?php echo $dest['id']; ?>"><?php echo $dest['benua_name']; ?></a>
                </li>
                <li><?php echo $dest['des_name']; ?></li>
              
            </ul>
            <div class="booking-item-details">
                <header class="booking-item-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="lh1em"><?php echo $dest['benua_name']; ?></h2>
                            <p class="lh1em text-small"><i class="fa fa-map-marker"></i> <?php echo $dest['short_description']; ?></p>
                          
                        </div>
                        <div class="col-md-3">
                            <p class="booking-item-header-price"><small>price</small>  <span class="text-lg">RM <?php echo $dest['price']; ?></span>
                            </p>
                        </div>
                    </div>
                </header>
                <div class="row">
                    <div class="col-md-7">
                        <div class="tabbable booking-details-tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
                                </li>
                                <li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-1">
                                    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                                        <img src="../assets/img/<?php echo $dest['img']; ?>" alt="Image Alternative text" title="Upper Lake in New York Central Park" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="google-map-tab">
                                    <div id="map-canvas" style="width:100%; height:500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="booking-item-meta">
                            <h2 class="lh1em mt40"><?php echo $dest['des_name']; ?></h2>
                            <h3>97% <small >of guests recommend</small></h3>
                            <div class="booking-item-rating">
                                <ul class="icon-list icon-group booking-item-rating-stars">
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                    <li><i class="fa fa-star"></i>
                                    </li>
                                </ul><span class="booking-item-rating-number"><b >4.7</b> of 5 <small class="text-smaller">guest rating</small></span>
                                <p><a class="text-default" href="#">based on 1535 reviews</a>
                                </p>
                            </div>
                        </div>
                        <div class="gap gap-small">
                         
                            <p><?php echo $dest['description']; ?></p>
                        </div>
                        <a href="#" class="btn btn-primary btn-lg">Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
            <div class="gap gap-small"></div>
        </div>
        <?php include 'include/footer.php'; ?>