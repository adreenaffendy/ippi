<?php 
    session_start();
    include('include/header2.php'); 
    include('session.php');
	include ('lib/common.php');

    $user_id = $_SESSION['user_id'];
    $destination = $_GET['id'];
    $start_date = $_GET['start'];
    $end_date = $_GET['end'];

    $sql = "select *,a.image as image,a.description as description, b.destination_id as destination_id 
            from plan a join final_plan b on a.plan_id = b.place_id 
            where NOT (b.start_date > '".$end_date."' OR b.end_date < '".$start_date."')
            and b.user_id = ".$user_id." AND destination_id = ".$destination."
            order by a.day ASC, a.time ASC";

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
            <ul class="breadcrumb">
                <li><a onclick="goBack()">Back</a></li>
            </ul>
            <br/>
            <div class="booking-item-details">
                   <div class="col-md-12">
                        <div class="tabbable booking-details-tabbable">
                            <h4><strong>Your Plan</strong></h4>
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

                                    <div class="col-md-12">
                                        <?php
                                        $bil = 0;
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
                                        
										<?php $bil++;  } ?>
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
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</html> 
<?php include 'include/footer.php'; ?>