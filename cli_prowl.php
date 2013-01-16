<?php
$apikey = "<<insert api key>>";
$appname = "<appname>";

$type = 1;		
	if (isset($argv[1], $argv[2], $argv[3], $argv[4])){
			$event = $argv[1];
			$desc = $argv[2];
			$priority = $argv[3];
			$url = $argv[4];
		} else { 
			$type=0; 
		}		
	
	include "class.prowl.php";
	

 
 
	if ($type == 0) {
 	 	$event = $appname . " EVENT";
 		$desc = "No Event Information Provided";
 		$priority = "0";
 		$url = "";
 	
 	}
 
	
	//$prowl = new Prowl($apikey, $appname);

	$result = prowl("$apikey", "$appname", "$event", "$desc", "$priority", "$url");
	
	#
	# This just prints out the result of the notification.
	# uncomment to see results in terminal
	#
	
	print "<pre>";
	print_r($result);
	print "</pre>";/* */
?>
