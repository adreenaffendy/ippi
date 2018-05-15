<?php 
session_start();
include 'include/header2.php'; 
include 'session.php';

$id = $_GET['id'];

$plan = getPlan($id);

?>
 <div class="container">
            <ul class="breadcrumb">
                <li><a onclick="goBack()">Back</a></li>
                
            </ul>
            <div class="booking-item-details">
                <header class="booking-item-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="lh1em"><?php echo $plan['title']; ?></h2>
                            
                        </div>
                       <!--  <div class="col-md-3">
                            <p class="booking-item-header-price"><small>price</small>  <span class="text-lg">RM </span>
                            </p>
                        </div> -->
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
                                        <img src="../assets/img/<?php echo $plan['image']; ?>" alt="Image Alternative text" />
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="google-map-tab">
                                    <div id="map-canvas" style="width:100%; height:500px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="gap gap-small"></div>
                            <p><?php echo $plan['description']; ?></p>
                      
                    </div>
                    <div class="col-md-5">
                         <div class="gap gap-small"></div>
                        <div class="booking-item-meta">
                            <p><strong>Recommended Duration</strong></p>
                             <p><?php echo $plan['recommended_duration']; ?></p><br>
                             <p><strong>Hours</strong></p>
                             <p><?php echo $plan['hours']; ?></p><br>
                             <p><strong>Contact</strong></p>
                             <p><?php echo $plan['contact']; ?></p>
							 <p><strong>On The Web</strong></p>
                             <p>
								<a href="<?php echo $plan['On The Web']; ?>"><?php echo $plan['On The Web']; ?></a>
							</p>
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