<?php 
    session_start();
    include 'include/header2.php'; 
    include 'session.php';
	
	$destination = $_SESSION['destination'];
        $destination_id = $_SESSION['destination_id'];

    $sql = "select *,a.image as image,a.description as plan_description 
            from suggested a join destination b on a.destination_id = b.destination_id 
            WHERE NOT EXISTS (
                SELECT plan_id FROM plan 
                    WHERE plan.plan_id = a.plan_id
                    AND plan.destination = $destination_id)
            AND b.destination_id = $destination_id;";
    
    $mysql = mysqli_query($con, $sql);
?>
    <div class="gap gap-small"></div>
        <div class="container">
            <div class="booking-item-details">
               
                
                    <div class="col-md-12">
                        <div class="tabbable booking-details-tabbable">
                            <!-- <h4><strong>From</strong> <?php echo $_POST['start']; ?> <strong>to</strong> <?php echo $_POST['end']; ?></h4> -->
                            <ul class="nav nav-tabs" id="myTab">
                                <li ><a href="waktusolat.php" ><i class="fa fa-camera"></i>Prayer times</a>
                                </li>
                                <li class="active"><a href="plan.php" ><i class="fa fa-map-marker"></i>Day by Day</a>
                                </li>
                                <li><a href="masjid.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Mosques Around You</a>
                                </li>
                                <li><a href="food.php" ><i class="fa fa-map-marker"></i>Food & Restaurants</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content">
                                <div class="tab-pane fade " id="route">

                                </div>
                                <div class="tab-pane fade in active" id="day">
                                    <div class="gap gap-small"></div>
                                    <h3>Add your preferred activity!</h3>
                                    <div class="gap gap-small"></div>
                                     <ul class="booking-list">
                                        <?php 
                                            $bil = 1;
                                            while($row = mysqli_fetch_array($mysql)){
                                                $string = strip_tags($row['plan_description']);
                                                if (strlen($string) > 150) {

                                                    // truncate string
                                                    $stringCut = substr($string, 0, 150);

                                                    // make sure it ends in a word so assassinate doesn't become ass...
                                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                                }
                                        ?>
                                        <li>
                                            <a class="booking-item" href="addplan_details.php?id=<?php echo $row['plan_id']; ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="../assets/img/<?php echo $row['image']; ?>" alt="Image Alternative text" title="<?php echo $row['title']; ?>" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="booking-item-title"><?php echo $row['title']; ?></h5>
                                                       
                                                        <p class="booking-item-description"><?php echo $string; ?></p>
                                                    </div>
                                                    <div class="col-md-3"><span class="booking-item-price"></span><span class="btn btn-primary">Add to plan</span>
                                                </div>
                                                </div>
                                            </a>
                                        </li>
                                       <?php $bil++; }; ?> 
                                    </ul>
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
        <?php include 'include/footer.php'; ?>