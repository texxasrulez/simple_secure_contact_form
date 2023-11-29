<?php

/*
PHP Simple and Secure Contact Sendmail Script by Gene Hawkins
*/

$configs = include('config/config.inc.php');

// Attempt to get Users Real IP Address
function getUserIP(){
     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  // Check ip from shared internet
       $ip=$_SERVER['HTTP_CLIENT_IP'];
     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  // Check ip is pass from proxy
       $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
     } else {
       $ip=$_SERVER['REMOTE_ADDR'];
     }
     return $ip;
  }

// Loads the form field data from your contact page into variables as well as other useful things.
// If you add a form field, you will need to add it here.
	$name    = $_POST['name'];
	$email   = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$subject = $_POST['subject'];
	$inquiry = $_POST['message'];	
	$user_ip = getUserIP();
	$digest  = "md5=".base64_encode(hash("md5", $inquiry, true));
	$date    = date(DateTime::RFC822);
	
// Create email headers
$headers = array (
	'From' 			=> $email,
	'Reply-To' 		=> $email,
	'MIME-Version' 	=> '1.0',
	'Content-type' 	=> 'text/html; charset=iso-8859-1',
	'Date' 			=> $date,
	'Digest' 		=> $digest,
	'X-Mailer' 		=> 'PHP Version '. phpversion()
	);

// Check for bad things and then get rid of them
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
// Compose your HTML email message
// Choose Theme color from themes directory
include("themes/" . $theme . "_theme.php");

// Checking for email injection.
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}
	
// Captcha Verification based on choice in Configuration Option in this file

// Google Re Captcha Verification
	if ($verify->success) {

// If the user tries to access this script directly, redirect them to the contact form,
	if (!isset($_POST['email'])) {
		header( "Location: $feedback_page" );
}

// If the form fields are empty, redirect to the error page.
	elseif (empty($name) || empty($email) || empty($subject) || empty($inquiry)) {
		header( "Location: $error_page" );
}

// If injection is detected, redirect to the spammer page.
	elseif ( isInjected($email) || isInjected($name)  || isInjected($subject)  || isInjected($inquiry) ) {
		header( "Location: $ruaspammer" );
}
	
// If all previous tests passed, send the email to webmaster then redirect to the thank you page.

	else {
		(mail($webmaster_email, $subject, $message, $headers));
	header( "Location: $thankyou_page" );
	}

}

// Database Section
        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking values from the form
        $name =  $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $email =  $_REQUEST['email'];
        $message = $_REQUEST['message'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO $db_table VALUES ('$name', '$subject', '$email', '$message', '$user_ip')";  
         
        if(mysqli_query($conn, $sql)){
            echo "Entries added!";
        }
         
        // Close connection
        mysqli_close($conn);
?>
