<?php

/*
PHP Simple and Secure Contact Sendmail Script by Gene Hawkins
*/

// Configuration - Easy Config in this section

// Email Address to send message to
$webmaster_email = 'change_to_your_email';

// Show Website name and logo with URL link in Table Header and URL link in footer
$site_name = 'Site Name'; // Use your Site / Company Name here
$site_url = 'https://www.yourdomain.com'; // Best practice is to use https:// and do not leave a trailing backslash "/" IMPORTANT!
$site_logo = '/image_folder/image_name.png'; // Start with a backslash "/" IMPORTANT! - Upload your logo to appropriate directory

// Add extra text after Website Name in Table Header. Use null; for nothing
$form_title = '';
$form_name = '';

// Captcha Option - 'local'; 'google'; or null; (for no captcha) TODO for multiple choices - Google ReCaptcha is only choice right now
$captcha_option = '';

// Using Local Captcha
// Place code below before the Submit button on HTML page with Contact Form
/*
	<div class="elem-group">
    <label for="captcha">Please Enter the Captcha Text</label>
    <img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
    <br>
    <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
	</div>
	var refreshButton = document.querySelector(".refresh-captcha");
	refreshButton.onclick = function() {
	document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
}
*/

// Using Google Re Captcha - Go to https://www.google.com/recaptcha/admin/ to get your Keys to use this option
// Place this line of code before </head> tag on your HTML page where your Contact Form is: <script src='https://www.google.com/recaptcha/api.js'></script>
// Place this line of code in the body of the HTML page where you want your captcha box to be: <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
$secret = 'YOUR_OWN_SECRET_KEY'; // Change this to your secret key
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
$verify = json_decode(file_get_contents($url));

// Customized Themes TODO!!
// $theme = "";

// End Configuration - Edit below this line at your own risk

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

// URLs of supporting pages.
// If you add or change the names of any of the pages or their location, you will need to add/change here.
$feedback_page = "../index.html#contact";
$error_page    = "../error_message.html";
$thankyou_page = "../thank_you.html";
$ruaspammer    = "../spammer.html";

// Loads the form field data from your contact page into variables as well as other usefull things.
// If you add a form field, you will need to add it here.
$email   = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$inquiry = $_POST['message'] ;
$name    = $_POST['name'] ;
$subject = $_POST['subject'] ;
$user_ip = getUserIP() ;
$digest  = "md5=".base64_encode(hash("md5", $inquiry, true));
$date    = date(DateTime::RFC822);
 
// Create email headers
$headers = array (
	'From' => $email,
	'Reply-To' => $email,
	'Return Path' => $email,
	'Subject' => $subject,
	'MIME-Version' => '1.0',
	'Content-type' => 'text/html; charset=iso-8859-1',
	'Date' => $date,
	'Digest' => $digest,
	'X-Mailer' => 'PHP Version '. phpversion()
	);

// Check for bad things and then get rid of them
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
// Compose your HTML email message
$message  = "<html><body>";
$message .= "<table width=700px; style='border: 1px solid #153042;' cellpadding='10'>";
$message .= "<tr style='color: white; background: #153042;'><td align='center' colspan='2' text-align:'bottom'><a href=".$site_url."><img src=". $site_url.$site_logo ." align='left' height=45%></a><font size='4'><strong>" . $form_title . " " . $form_name . "</strong></font></td></tr>";
$message .= "<tr style='background: #d0e4f5;'><td width=22%><strong>Name:</strong></td><td>" .clean_string($name) . "</td></tr>";
$message .= "<tr style='background: #ecf4fb;'><td width=22%><strong>Email / IP Address: </strong></td><td>" .clean_string($email) . " <strong>/</strong> (<strong>" . $user_ip . "</strong>) " . "</td></tr>";
$message .= "<tr style='background: #d0e4f5;'><td width=22%><strong><u>Subject</u>: </strong></td><td><strong><u>" .clean_string($subject) . "</u></strong></td></tr>";
$message .= "<tr style='background: #ecf4fb;'><td width=22% valign='top'><strong>Message: </strong></td><td>" .clean_string($inquiry) . "</td></tr>";
$message .= "<tr style='color: white; background: #153042;'><td align='right' colspan='2'><a href=". $site_url ." . style='color: white; text-decoration: none'>" . $site_name . "</a></td></tr>";
$message .= "</table>";
$message .= '<a href="https://www.paypal.me/texxasrulez"><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></a>';
$message .= "</body></html>";

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

// If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_POST['email'])) {
header( "Location: $error_page" );
}

// If the form fields are empty, redirect to the error page.
elseif (empty($name) || empty($email)) {
header( "Location: $error_page" );
}

// If email injection is detected, redirect to the spammer page.
elseif ( isInjected($email) || isInjected($name)  || isInjected($subject) ) {
header( "Location: $ruaspammer" );
}


// Captcha Verification based on choice in Configuration Option in this file

// Google Re Captcha Verification
if ($verify->success) {

// If all previous tests passed, send the email then redirect to the thank you page.

	if (mail($webmaster_email, $subject, $message, $headers)) {
	header( "Location: $thankyou_page" );
	} else {
		header( "Location: $error_page" );
}
}

?>