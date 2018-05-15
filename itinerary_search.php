<?php

//error_reporting(0);
include("include/header.php");
include("../lib/common.php");
$op = $_GET["op"];

if($op == "search"){
	$q = $_GET["q"];
	
	// we connect to localhost at port 3307
	$result = mysqli_query($con,"SELECT name,short_description FROM destination where name LIKE '".$q."%' ");
	while($row=mysqli_fetch_array($result)) {
       $return[] = $row;
   }

	echo json_encode($return);
}

if($op == "search_detail"){
	
}


?>