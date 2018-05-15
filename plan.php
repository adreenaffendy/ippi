<?php 
    session_start();
    include('include/header2.php'); 
    include('session.php');
	include ('lib/common.php');
	
	if(!$_SESSION['start_date']){
		$_SESSION['start_date'] = $_POST['start'];
	}
	if(!$_SESSION['end_date']){ 
		$_SESSION['end_date'] = $_POST['end'];
	}
	if(!$_SESSION['destination']){
		$_SESSION['destination'] = $_POST['destination'];
	}
	
    $start_ts = strtotime($_SESSION['start_date']);
    $end_ts   = strtotime($_SESSION['end_date']);
	$diff     = floor(($end_ts - $start_ts)/ (60*60*24)) + 1;

    if(!$_SESSION['day_left']){
        $_SESSION['day_left'] = $diff;
    }

    $destination = $_SESSION['destination'];

    $pieces   = explode(",", $destination);
	
	$row = getWaktuSolat (trim($pieces[0]), trim($pieces[1]));

    $_SESSION['waktu'] = $row['name'];
	
	$_SESSION['place'] = trim($pieces[0]);

    $array_id = array();

    $sql      = "select *,a.image as image,a.description as description, b.destination_id as destination_id, c.id as benua
                from plan a join destination b on a.destination = b.destination_id join benua c on b.benua = c.id
                where b.name = '".trim($pieces[0])."' 
                and b.short_description = '".trim($pieces[1])."' 
                and a.day <= ".$diff." order by a.day ASC, a.time ASC";
				
    $mysql    = mysqli_query($con, $sql);

?>

<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>

    <style>
        /* Popup container - can be anything you want */
        .popup {
            position: relative;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* The actual popup */
        .popup .popuptext {
            visibility: hidden;
            width: 250px;
            height: 200px;
            background-color: grey;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class - hide and show the popup */
        .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
            from {opacity: 0;} 
            to {opacity: 1;}
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
        }
    </style>
    <body>
        <div class="gap gap-small"></div>
        <div class="container">
            <div class="booking-item-details">
                   <div class="col-md-12">
                        <div class="tabbable booking-details-tabbable">
                            <h4><strong>From</strong> <?php echo $_SESSION['start_date']; ?> <strong>to</strong> <?php echo $_SESSION['end_date']; ?></h4>
                            <ul class="nav nav-tabs" id="myTab">
                                <li ><a href="waktusolat.php?name=<?php echo $_SESSION['waktu']?>" ><i class="fa fa-camera"></i>Prayer times</a>
                                </li>
                                <li class="active"><a href="plan.php" ><i class="fa fa-map-marker"></i>Day by Day</a>
                                </li>
                                    <li><a href="masjid.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Mosques Around You</a>
                                </li>
                                    <li><a href="food.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Halal Foodstores</a>
                                </li>
                                    <li><a href="TemplatePerak.php?name=<?php echo $_SESSION['place']?>" ><i class="fa fa-map-marker"></i>Accommodation</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade " id="route"></div>
                                <div class="tab-pane fade in active" id="day">
                                    <div class="col-md-12">
                                    <div class="gap gap-small"></div>						
                                    <script>
                                    // When the user clicks on div, open the popup
                                    function myFunction() {
                                        var popup = document.getElementById("myPopup");
                                        popup.classList.toggle("show");
                                    }

                                    function Copy() 
                                    {
                                        var Url = document.createElement("textarea");
                                        Url.innerHTML = window.location.href;
                                        Copied = Url.createTextRange();
                                        Copied.execCommand("Copy");
                                    }
                                    </script>

                                    <div class="col-md-9">
                                        <?php
                                        $bil = 1;
                                        while($row = mysqli_fetch_array($mysql)){
                                            $_SESSION['destination_id'] = $row['destination_id'];

                                            $array_id[] = $row['plan_id'];

                                            $string = strip_tags($row['description']);
                                            if (strlen($string) > 150) {

                                                // truncate string
                                                $stringCut = substr($string, 0, 150);

                                                // make sure it ends in a word so assassinate doesn't become ass...
                                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                            }
                                    ?>
                                            <a class="booking-item" href="plan_details.php?id=<?php echo $row['plan_id']; ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="../assets/img/<?php echo $row['image']; ?>" alt="Image Alternative text" title="Old No7" />
                                                    </div>
                                                    <div class="col-md-6">
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
                                                            </ul><span class="booking-item-rating-number"><b >4.0</b> of 5</span><small>(388 reviews)</small>
                                                        </div>
                                                        <h5 class="booking-item-title"><?php echo $row['title']; ?></h5>
                                                       
                                                        <p class="booking-item-description"><?php echo $string; ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="booking-item-price">Day <?php echo $row['day']; ?> </span><br>
														<span class="booking-item-price"><?php echo $row['time']; ?> </span>
                                                    </div>
                                                </div>
                                            </a>
                                        
                                            <?php $bil++;}  
                                            
                                            $array_id2 = array();

                                            $sql      = "select *, a.day as add_day,b.image as image,b.description as description, b.destination_id as destination_id
                                                            from temp_plan a join suggested b on a.destination_id = b.plan_id join destination c on b.destination_id = c.destination_id
                                                            where c.name = '".trim($pieces[0])."' 
                                                            and c.short_description = '".trim($pieces[1])."'";

                                            $mysql    = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($mysql)<0){

                                            }else{ 

                                                while($row = mysqli_fetch_array($mysql)){
                                                    
                                                    $plan = $row['plan_id'];
                                                    
                                                    $array_id[] = $row['plan_id'];

                                                    $string = strip_tags($row['description']);
                                                    if (strlen($string) > 150) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 150);

                                                        // make sure it ends in a word so assassinate doesn't become ass...
                                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                                    }
                                                ?>
                                                <br/>
                                                <h3>New Places</h3>
                                            <a class="booking-item" href="plan_details.php?id=<?php echo $plan; ?>">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="../assets/img/<?php echo $row['image']; ?>" alt="Image Alternative text" title="Old No7" />
                                                    </div>
                                                    <div class="col-md-6">
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
                                                            </ul><span class="booking-item-rating-number"><b >4.0</b> of 5</span><small>(388 reviews)</small>
                                                        </div>
                                                        <h5 class="booking-item-title"><?php echo $row['title']; ?></h5>
                                                       
                                                        <p class="booking-item-description"><?php echo $string; ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="booking-item-price">Day <?php echo $row['add_day']; ?> </span><br>
                                                        <span class="booking-item-price"><?php echo $row['time']; ?> </span>
                                                    </div>
                                                </div>
                                            </a>
                                        
                                            <?php $bil++; } } $k = base64_encode(serialize($array_id));  ?>
                                </div>
                                    <div class="col-md-3" style="float:right">
                                        <div class="row">
                                            <div class="list-group">
                                                <a class="list-group-item" href="addplaces.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Add Activity</a>
                                                <a class="list-group-item" href="addplan.php?id=<?php echo $k ?>&period=<?php echo $diff?>"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i>&nbsp; Save To Plans</a>
                                                    <div class="list-group-item"><a class="popup" href="#" onClick="myFunction();"><i class="fa fa-share-alt fa-fw" aria-hidden="true"></i>&nbsp; Share
                                                     <span class="popuptext" id="myPopup">Share Plan<br><br><br>
                                                             <span button onclick="document.getElementById('id01').style.display='block'" class="fa-stack fa-lg">
                                                             <i class="fa fa-square-o fa-stack-2x"></i>
                                                             <i class="fa fa-envelope-o fa-stack-1x"></i><br>
                                                            </span>
                                                            <span button onClick= "Copy()" class="fa-stack fa-lg">
                                                                <i class="fa fa-square-o fa-stack-2x"></i>
                                                                <i class="fa fa-link fa-stack-1x"></i>
                                                            </span>
                                                        </span>
                                                    </a></div>
                                                <a class="list-group-item" href="#" onClick="window.print();"><i class="fa fa-print fa-fw" aria-hidden="true"></i>&nbsp; Print</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="id01" class="w3-modal">
                                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding:32px;max-width:600px">
                                            <div class="w3-container w3-white w3-center">
                                                <h1 class="w3-wide">EMAIL THIS PLAN</h1>
                                                <p>We really hope you would like it.</p>
                                                <center><form>
                                                    <label>Enter your E-mail Address</label>
                                                    <input type="text" class="form-control">
                                                    <input type="submit" class="btn btn-primary" value="Subscribe">
                                                </form></center>
                                                <div class="w3-row">
                                                    <div class="w3-half">
                                                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-green">Email Now</button>
                                                    </div>
                                                    <div class="w3-half">
                                                        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-block w3-red">No, Thanks</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>	
                                    </div>
                                </div>
                            <div class="tab-pane fade" id="stay"></div>
                            <div class="tab-pane fade" id="travel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--<center><button onClick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</button></center>!-->
        <div class="gap"></div>
        <div class="gap gap-small"></div>
    </body>
</html> 
<?php include 'include/footer.php'; ?>