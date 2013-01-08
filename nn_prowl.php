<?php


// 	if (isset($argv[1])){
//     $type = $argv[1];} else { $type=0;}
$type = 1;		
	if (isset($argv[1], $argv[2])){
			$event = $argv[1];
			$desc = $argv[2];
		} else { 
			$type=0; 
		}		
	
	include "class.prowl.php";
	

 
 
	if ($type == 0) {
 	 	$event = "NNEVENT";
 		$desc = "No Event Information Provided";
 	
 	}
 
	
	$prowl = new Prowl("cryogenx", "eew11909", "CXBIN");
	
	
	#
	# EVENT NAME = Name of your event, e.g. "Website down"
	# DESCRIPTION = Description/body of notification 
	#


	$result = $prowl->send("$event", "$desc");
	
	#
	# This just prints out the result of the notification. Simples.
	#
	
	print "<pre>";
	print_r($result);
	print "</pre>";/* */
?>