<?php 
    session_start();
    include('include/header2.php'); 
    include('session.php');
	include ('lib/common.php');

    $user_id = $_SESSION['user_id'];

    $sql = "select distinct(a.destination_id) as destination_id, a.name as name, b.start_date as start_date, b.end_date as end_date
            from destination a join final_plan b on a.destination_id = b.destination_id
            where b.user_id = ".$user_id." ORDER BY start_date ASC";

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

                                    <div class="col-md-5">
                                        <?php
                                        $bil = 1;
                                        while($row = mysqli_fetch_array($mysql)){
                                            $_SESSION['destination_id'] = $row['destination_id'];

                                            $string = strip_tags($row['description']);
                                            if (strlen($string) > 150) {

                                                // truncate string
                                                $stringCut = substr($string, 0, 150);

                                                // make sure it ends in a word so assassinate doesn't become ass...
                                                $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                            }

                                    ?>
                                            <a class="booking-item" href="view_plan2.php?id=<?php echo $row['destination_id']?>&start=<?php echo $row['start_date']?>&end=<?php echo $row['end_date']?>">
                                                <?php echo $row['name']?> [ <?php echo $row['start_date'] ?> - <?php echo $row['end_date']?> ]
                                            </a>
                                        
										<?php $bil++;  }  ?>
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