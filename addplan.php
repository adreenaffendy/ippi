<?php 
session_start();
include "../lib/common.php";

    $user_id = $_SESSION['user_id'];
    $destination_id = $_SESSION['destination_id'];
    $place_id = unserialize(base64_decode($_GET['id']));
    $start_date = $_SESSION['start_date'];
    $end_date = $_SESSION['end_date'];
    $period = $_GET['period'];

    $sql = "SELECT * FROM final_plan 
            WHERE NOT (start_date > '".$end_date."' OR end_date < '".$start_date."')
            AND user_id = ".$user_id."
            AND destination_id = ".$destination_id."";

        

    $query = mysqli_query(connect(), $sql);

    if($rowcount = mysqli_num_rows($query) > 0){
        echo '<script>alert("Cannot save plan due to duplicate date");</script>';
        echo '<script>window.location.href="plan.php" </script>';
    }   

    $truncate = "TRUNCATE TABLE temp_plan";
    $truncate_query = mysqli_query(connect(), $truncate);

    foreach ($place_id as $value){
        
        $sql = "INSERT INTO `final_plan`(`user_id`, `destination_id`, `place_id`, `start_date`, `end_date`, `period`) VALUES 
                    (".$user_id.",".$destination_id.",".$value.",'".$start_date."','".$end_date."',".$period.")";

        if($query = mysqli_query(connect(), $sql)){
            echo '<script>alert("Your plan has been added");</script>';
            echo '<script>window.location.href="plan.php" </script>';
            $truncate = "TRUNCATE TABLE temp_plan";
            $truncate_query = mysqli_query(connect(), $truncate);
        }else{
            echo '<script>alert("Fail to add plan");</script>';
            echo '<script>window.location.href="plan.php" </script>';
        }
    }
?>	