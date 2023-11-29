<?php

// Begin Configuration - Simple and Secure Contact Sendmail Configuration by Gene Hawkins

// Admin Email Address to send message to
	$webmaster_email = 'your_email';

// Show Website name and logo with URL link in Table Header and URL link in footer
	$site_name = 'your_website title'; // Use your Site / Company Name here
	$site_url = 'https://mydomain.net'; // Best practice is to use https:// and do not leave a trailing backslash "/" IMPORTANT!
	$site_logo = '/images/kontact.png'; // Start with a backslash "/" IMPORTANT! - Upload your logo to appropriate directory

// Add extra text after Website Name in Table Header.
	$form_title = 'Visitor'; // Whatever you want
	$form_name = 'Inquiry'; // Whatever you want

// URLs of supporting pages.
// If you add or change the names of any of the pages or their location, you will need to add/change here.
	$feedback_page = "../../index.html";
	$error_page    = "../../error_message.html";
	$thankyou_page = "../../thank_you.html";
	$ruaspammer    = "../../spammer.html";

// Captcha Option - 'local'; 'google'; or null; (for no captcha) TODO for multiple choices - Google ReCaptcha is only choice right now
// $captcha_option = 'google';

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

/*
 Using Google Re Captcha - Go to https://www.google.com/recaptcha/admin/ to get your Keys to use this option
 Place this line of code before </head> tag on your HTML page where your Contact Form is: <script src='https://www.google.com/recaptcha/api.js'></script>
 Place this line of code in the body of the HTML page where you want your captcha box to be: <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
*/

	$secret = 'your_secret_key_from_Google'; // Change this to your secret key
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$_POST['g-recaptcha-response'];
	$verify = json_decode(file_get_contents($url));

// Customized Themes
	$theme = 'blue'; // Valid choices so far = black, blue, green, teal, violet

// Database Settings - Add your credentials here
	$db_servername = 'localhost';
	$db_username = 'DBusername';
	$db_password = 'DBPassword';
	$db_name = 'DBName';
	$db_table = 'kontacts'; // Leave unless you renamed the table in your database

?>
