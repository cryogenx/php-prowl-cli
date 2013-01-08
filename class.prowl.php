<?php

		function prowl($apikey, $application, $event, $description, $priority, $url) {
		
			$url = "https://api.prowlapp.com/publicapi/add?apikey=". urlencode($apikey) . "&priority=" . urlencode($priority) . "&application=" . urlencode($application) . "&event=" . urlencode($event) . "&description=" . urlencode($description) . "&url=" . urlencode($url) ;
		
			$ch = curl_init($url);
					
			//curl_setopt($ch, CURLOPT_USERPWD, $this->username .":". $this->password);
			//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		
			$return = curl_exec($ch);
			
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close($ch);
			
			# Invalid username/password
			if($httpcode == "401"):
				
				return array("success" => "n",
							"error" => "Invalid username/password",
							"error_code" => "401");
				
			# No application/event defined
			elseif($httpcode == "400"):
			
				return array("success" => "n",
							"error" => "No application/event defined",
							"error_code" => "400");
			
			# All ok!
			endif;			

			return array("success" => "y",
						"error" => "",
						"error_code" => "");
		}

	
?>