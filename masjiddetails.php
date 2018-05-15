<?php 
session_start();
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';

$id = $_GET['id'];

$sql = "select * from mosque WHERE mos_id = $id";
		
$query = mysqli_query(connect(), $sql);
$mosque = mysqli_fetch_assoc($query);



?>
 <div class="container">
        <ul class="breadcrumb">
            <li><a onclick="goBack()">Back</a></li>
            
        </ul>
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="lh1em"><?php echo $mosque['title']; ?></h2>
                        
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-9">
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
                                    <img src="../assets/img/<?php echo $mosque['image']; ?>" alt="Image Alternative text" />
                                </div>
                            </div>
                            <div class="tab-pane fade" id="google-map-tab">
                                <div id="map-canvas" style="width:100%; height:500px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="gap gap-small"></div>
                        <p><?php echo $mosque['description']; ?></p>
                  
                </div>
                <div class="col-md-3">
                     <div class="gap gap-small"></div>
                    <div class="booking-item-meta">
                        <p><strong>State</strong></p>
                         <p><?php echo $mosque['short_description']; ?></p><br>
                         <p><strong>Address</strong></p>
                         <p><?php echo $mosque['address']; ?></p><br>
                         <p><strong>Landmarks</strong></p>
                         <p><?php echo $mosque['landmarks']; ?></p>
                        </div>

                    </div>
                    
                    <a href="mapMosque.php" class="btn btn-primary btn-lg">View Nearest Mosque</a>
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