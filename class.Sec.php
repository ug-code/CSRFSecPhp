<?php

	/**
	*	@since 2016-08-09
	*	@Description CSRF Sec.
	**/	

	#Form için token oluştur
	function generateFormToken($form) {
    
       // generate a token from an unique value
    	$token = md5(uniqid(microtime(), true));  
    	
    	// Write the generated token to the session variable to check it against the hidden field when the form is sent
    	$_SESSION[$form.'_token'] = $token; 
    	
    	echo $token;

	}

	#Token bizim tarafımızdan mı oluşturuldu?
	function verifyFormToken($form) {
    
	    // check if a session is started and a token is transmitted, if not return an error
		if(!isset($_SESSION[$form.'_token'])) { 
			return false;
	    }
		
		// check if the form is sent with token in it
		if(!isset($_GET['token'])) {
			return false;
	    }
		
		// compare the tokens against each other if they are still the same
		if ($_SESSION[$form.'_token'] !== $_GET['token']) {			
			return false;
	    }
		return true;
	}

	#Log oluşturuyoruz.
	function writeLog($where) {

		$ip = $_SERVER["REMOTE_ADDR"]; // Get the IP from superglobal
		$host = gethostbyaddr($ip);    // Try to locate the host of the attack
		$date = date("d M Y");
		
		// create a logging message with php heredoc syntax
		$logging = <<<LOG
			\n
			<< Start of Message >>
			There was a hacking attempt on your form. \n 
			Date of Attack: {$date}
			IP-Adress: {$ip} \n
			Host of Attacker: {$host}
			Point of Attack: {$where}
			<< End of Message >> 
LOG;
        
        // open log file
		if($handle = fopen('hacklog.log', 'a')) {
		
			fputs($handle, $logging);  // write the Data to file
			fclose($handle);           // close the file
			
		} 
	}
