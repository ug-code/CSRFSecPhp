<?php

	session_start();

	require(dirname(__FILE__).'/class.Sec.php');

	// generate a new token for the $_SESSION superglobal and put them in a hidden fiel	 
   if(isset($_GET['token'])){
   		if (verifyFormToken('form1')) {
   			/**
				bla bla bla...
   			**/
		} 
		else {
		   	echo "Hack-Attempt detected.";
		   	writeLog('Formtoken');
		}
	}
?>

<form method="get">	
	<input type="hidden" name="token" value="<?php generateFormToken('form1');?>">
	<input type="submit" value="gonder">
</form>
