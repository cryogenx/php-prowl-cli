<?php
//change these settings
$prowl_user = "" //your prowl username
$prowl_pass = "" //your prowl password
$prowl_app = "" //Prowl app name (the name of the app pushing the notifications)



// preset type variable
$type = 1;	

//check cli arguments are set	
	if (isset($argv[1], $argv[2])){
			//load cli args into variables
			$event = $argv[1];
			$desc = $argv[2];
		} else { 
			$type=0; 
		}		
	//incluse prowl api class
	include "class.prowl.php";
	

 
 	//if the type gets set to 0 in previous block send a generic prowl notification
	if ($type == 0) {
 	 	$event = "NNEVENT";
 		$desc = "No Event Information Provided";
 	
 	}
 
	
	$prowl = new Prowl($prowl_user, $prowl_pass, $prowl_app);
	
	
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