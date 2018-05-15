<?php 
include 'include/header2.php'; 
include 'session.php';
require 'connect.php';

?>

<html>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}
</style>

<head>
    <title>Travel Profile</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="Traveler - Premium template for travel companies">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/modernizr.js"></script>
	<script src="jquery-3.2.1.min.js"></script>


</head>

<body>

    <!-- FACEBOOK WIDGET -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">
        
                                 

        <div class="container">
            <h1 class="page-title">Travel Profile</h1>
        </div>



 <div class="container">
            <div class="row">
				
                <div class="col-md-3">
                    <aside class="user-profile-sidebar">
                        <div class="user-profile-avatar text-center">
                            <img src="<?php echo $row['image']; ?>" alt="" title="" />
                            <h5><?php echo $login_session; ?></h5>
                        </div>
						<div id="nav">
                        <ul class="list user-profile-nav">
                            <li><a href="#userprofile"><i class="fa fa-user"></i>Overview</a>
                            </li>
                            <li><a href="#"><i class="fa fa-cog"></i>Settings</a>
                            </li>
                            <li><a href="mylisting.php"><i class="fa fa-pencil"></i>My Listing</a>
                            </li>
                            <li><a href="status.php"><i class="fa fa-handshake-o"></i>Offer Made to My Listing</a>
                            </li>
                            <li><a href="mybookingstatus.php"><i class="fa fa-cart-arrow-down"></i>My booking status</a>
                            </li>
                            <li><a href="view_plan.php"><i class="fa fa-heart-o"></i>Wishlist</a>
                            </li>
                        </ul>
						</div>
                    </aside>
                </div>
				
                <div class="col-md-9">
                    <h4>Total Traveled</h4>
                    <ul class="list list-inline user-profile-statictics mb30">
                        <li><i class="fa fa-dashboard user-profile-statictics-icon"></i>
                            <h5>12540</h5>
                            <p>Miles</p>
                        </li>
                        <li><i class="fa fa-globe user-profile-statictics-icon"></i>
                            <h5>2%</h5>
                            <p>World</p>
                        </li>
                        <li><i class="fa fa-building-o user-profile-statictics-icon"></i>
                            <h5>15</h5>
                            <p>Cityes</p>
                        </li>
                        <li><i class="fa fa-flag-o user-profile-statictics-icon"></i>
                            <h5>3</h5>
                            <p>Countries</p>
                        </li>
                        <li><i class="fa fa-plane user-profile-statictics-icon"></i>
                            <h5>20</h5>
                            <p>Trips</p>
                        </li>
                    </ul>

<div id="userprofile">              
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_agency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_id = $user_id;

$sql = "SELECT * FROM  `user` WHERE user_id =' ". $user_id . " '";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                echo"<div id='userprofile' class='toggle'>
                    <div style='width:100%; height:400px;'>
                    <table style='width:100%' class='w3-container w3-gray'>
                    <tr>
                            <th><a href='#'><i class='fa fa-user'></i> First Name</a>
                            </th>
                            <td><a href='#'>" .$row["firstname"]. "</a>
                            </td>
                    </tr>
                    <tr>
                            <th><a href='#'><i class='fa fa-user'></i> Last Name</a>
                            </th>
                            <td><a href='#'> " .$row["lastname"]. "</a>
                            </td>
                    </tr>
                    <tr>
                            <th><a href='#'><i class='fa fa-envelope-o'></i> Email</a>
                            </th>
                            <td><a href='#'> " .$row["email"]. " </a>
                            </td>
                    </tr>
                    <tr>
                            <th><a href='#'><i class='fa fa-street-view'></i> Username</a>
                            </th>
                            <td><a href='#'> " .$row["username"]. " </a>
                            </td>
                    </tr>
                    <tr>
                            <th><a href='mybookingstatus.php'><i class='fa fa-clock-o'></i> Booking History</a>
                            </th>
                            <td><a href='#'> </a>
                            </td>
                    </tr>
                    </table>
                </div></div>";
    
    }
} else {
    echo "0 results";
}



$conn->close();
?>
</div>

				<!-- <tr>
                            <th><a href="user-profile-settings.html"><i class="fa fa-user"></i> Last Name</a>
                            </th>
                            <td><a href="user-profile-settings.html"> </a>
                            </td>
					</tr>
					<tr>
                            <th><a href="user-profile-photos.html"><i class="fa fa-user"></i> Email</a>
                            </th>
                            <td><a href="user-profile-booking-history.html"> </a>
                            </td>
					</tr>
					<tr>
                            <th><a href="user-profile-booking-history.html"><i class="fa fa-user"></i> Username</a>
                            </th>
                            <td><a href="user-profile-booking-history.html"> </a>
                            </td>
					</tr>
					<tr>
                            <th><a href="user-profile-booking-history.html"><i class="fa fa-clock-o"></i> Booking History</a>
                            </th>
                            <td><a href="user-profile-booking-history.html"> </a>
                            </td>
					</tr>
					</table>
                </div>-->

            </div>
        </div>



        <div class="gap"></div>
       

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/slimmenu.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-timepicker.js"></script>
        <script src="js/nicescroll.js"></script>
        <script src="js/dropit.js"></script>
        <script src="js/ionrangeslider.js"></script>
        <script src="js/icheck.js"></script>
        <script src="js/fotorama.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script src="js/typeahead.js"></script>
        <script src="js/card-payment.js"></script>
        <script src="js/magnific.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/tweet.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/gridrotator.js"></script>
        <script src="js/custom.js"></script>
    </div>
	
<script>
$("#nav a").click(function(e){
    e.preventDefault();
    $(".toggle").hide();
    var toShow = $(this).attr('href');
    $(toShow).show();
});
</script>
	
</body>

</html>


<?php include 'include/footer.php'; ?>