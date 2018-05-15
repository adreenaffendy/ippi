<?php 
session_start();
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';

$id = $_GET['id'];

$sql = "select * from suggested WHERE plan_id = $id";
		
$query = mysqli_query(connect(), $sql);
$suggested = mysqli_fetch_assoc($query);

?>
 <div class="container">
        <ul class="breadcrumb">
            <li><a onclick="goBack()">Back</a></li>
        </ul>
        <div class="booking-item-details">
            <header class="booking-item-header">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="lh1em"><?php echo $suggested['title']; ?></h2>
                        
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-8">
                    <div class="tabbable booking-details-tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
                            </li>
                            <!--<li><a href="#google-map-tab" data-toggle="tab"><i class="fa fa-map-marker"></i>On the Map</a>
                            </li>!-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-1">
                                <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
                                    <img src="../assets/img/<?php echo $suggested['image']; ?>" alt="Image Alternative text" />
                                </div>
                            </div>
                            <div class="tab-pane fade" id="google-map-tab">
                                <div id="map-canvas" style="width:100%; height:500px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="gap gap-small"></div>
                        <p><?php echo $suggested['description']; ?></p>
                  
                </div>
                <form action="addplan_details2.php" method="POST">
                <div class="col-md-4">
                    <div class="gap gap-small"></div>
                    <div class="booking-item-meta">
                        <p><strong>Recommended Duration</strong></p>
                        <p><?php echo $suggested['recommended_duration']; ?></p><br>
                        <p><strong>Hours</strong></p>
                        <p><?php echo $suggested['hours']; ?></p><br>
                        <p><strong>Contact</strong></p>
                        <p><?php echo $suggested['contact']; ?></p>
                        <p><strong>Day</strong></p>
                        <select name="day" id="day">
                            <?php 
                                for($i = 1; $i <= $_SESSION['day_left']; $i++){
                                    echo "<option value='$i'>$i</option>";        
                                }
                            ?>
                            
                        </select>
                        <br/><br/>
                        <p><strong>Time</strong></p>
                        <input type="text" name="time" id="time">
                        <input type="hidden" name="destination_id" value="<?php echo $id; ?>">
                    </div>
                        <!-- <a href="addplan_details2.php?id=<?php echo $id; ?>&title=<?php echo $suggested['title']?>&description=<?php echo $suggested['description'];?>&image=<?php echo $suggested['image']; ?>&duration=<?php echo $suggested['recommended_duration']; ?>&day=<?php echo $day;?>&time=<?php echo $time?>">
                                <span class="booking-item-price"></span><span class="btn btn-primary">Add to plan</span>
                        </a> -->
                    <br/>
                    <span class="booking-item-price"></span>
                    <input type="submit" name="submit" value="Add to plan" class="btn btn-primary">
                </div>
                </form>
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