<?php

	class Prowl {
	
		private $username;
		private $password;
		private $application;
	
		public function __construct($username = "", $password = "", $application = 'PHP Prowl') {
			
			$this->application	= $application;
            $this->username		= $username;
            $this->password		= $password;
        }
        
		public function send($event, $description) {
		
			$url = "https://prowl.weks.net/api/add_notification.php?application=". urlencode($this->application)  ."&event=". urlencode($event) ."&description=". urlencode($description);
		
			$ch = curl_init($url);
					
			curl_setopt($ch, CURLOPT_USERPWD, $this->username .":". $this->password);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
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
	
	};
	
?>