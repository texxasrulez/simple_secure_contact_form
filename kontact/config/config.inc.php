<?php
// ===============================
// Configuration File for Simple and Secure Contact Sendmail Script by Gene Hawkins
// ===============================

// ===============================
// Database Settings
// ===============================
$DATABASE_HOST 		= 'localhost';
$DATABASE_USER 		= '';
$DATABASE_PASS 		= '';
$DATABASE_NAME 		= '';
$DATABASE_TABLE 	= 'kontacts';

// ===============================
// Recipient Email Addresses
// Add more $recipient# as needed and update 'Assign User ID' section in send_mail.php
// ===============================
$recipient1 = 'email1@domain.net';
$recipient2 = 'email2@domain.net';
$recipient3 = 'email3@domain.net';

// ===============================
// Website Branding Settings
// ===============================
$site_name  = 'Domain.net';							// Company or site name
$site_url   = 'https://domain.net';					// Full URL without trailing slash
$site_logo  = '/assets/images/genesworld.png';		// Path to logo, starting with slash

$form_title = 'Visitor';							// Extra text in header (e.g., "Visitor")
$form_name  = 'Contact';							// Name of form (e.g., "Contact Form")

// ===============================
// Supporting Page URLs
// ===============================
$feedback_page = "../../index.html";
$error_page    = "../../error_message.html";
$thankyou_page = "../../thank_you.html";
$ruaspammer    = "../../spammer.html";

// ===============================
// Captcha Settings
// (Currently only Google reCAPTCHA supported)
// ===============================
$secret   = 'your_secret_key'; // Google reCAPTCHA secret key
$grc_url  = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $_POST['g-recaptcha-response'];
$verify   = json_decode(file_get_contents($grc_url));

return [
    'DATABASE_HOST'   => $DATABASE_HOST,
    'DATABASE_USER'   => $DATABASE_USER,
    'DATABASE_PASS'   => $DATABASE_PASS,
    'DATABASE_NAME'   => $DATABASE_NAME,
    'DATABASE_TABLE'  => $DATABASE_TABLE,

    'recipient1'      => $recipient1,
    'recipient2'      => $recipient2,
    'recipient3'      => $recipient3,

    'site_name'       => $site_name,
    'site_url'        => $site_url,
    'site_logo'       => $site_logo,

    'form_title'      => $form_title,
    'form_name'       => $form_name,

    'feedback_page'   => $feedback_page,
    'error_page'      => $error_page,
    'thankyou_page'   => $thankyou_page,
    'ruaspammer'      => $ruaspammer,

    'secret'          => $secret,
    'verify'          => $verify,

// ===============================
// Theme Selection (Numbered 1–21)
//  1: Autumn  2: Black  3: Blue  4: Cyan  5: Dark  6: Gold  7: Green  8: Grey  9: High Contrast 10: Light
//  11: Neon  12: Orange  13: Pink  14: Purple  15: Red  16: Teal  17: Violet 18: Colorful 19: Stylish 20: Dark Gradient
//  21: Navy Blue Gradient
// ===============================
    'theme_choice'    => 19 // ← Change this number to select your desired theme (1–21)
];

