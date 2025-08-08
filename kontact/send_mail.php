<?php
/*
 * PHP Simple and Secure Contact Sendmail Script by Gene Hawkins
 * https://genesworld.net
 */

/*--------------------------------------------------------------
 * Load Configuration
 *------------------------------------------------------------*/
$configs = include('config/config.inc.php');

$DATABASE_HOST   = $configs['DATABASE_HOST'];
$DATABASE_USER   = $configs['DATABASE_USER'];
$DATABASE_PASS   = $configs['DATABASE_PASS'];
$DATABASE_NAME   = $configs['DATABASE_NAME'];
$DATABASE_TABLE  = $configs['DATABASE_TABLE'];

$recipient1      = $configs['recipient1'];
$recipient2      = $configs['recipient2'];
$recipient3      = $configs['recipient3'];

$site_name       = $configs['site_name'];
$site_url        = $configs['site_url'];
$site_logo       = $configs['site_logo'];

$form_title      = $configs['form_title'];
$form_name       = $configs['form_name'];

$feedback_page   = $configs['feedback_page'];
$error_page      = $configs['error_page'];
$thankyou_page   = $configs['thankyou_page'];
$ruaspammer      = $configs['ruaspammer'];

$verify          = $configs['verify'];
$theme_number    = $configs['theme_choice'] ?? 1;

/*--------------------------------------------------------------
 * Utility Functions
 *------------------------------------------------------------*/
function getUserIP() {
    return $_SERVER['HTTP_CLIENT_IP']
        ?? $_SERVER['HTTP_X_FORWARDED_FOR']
        ?? $_SERVER['REMOTE_ADDR'];
}

function clean_string($string) {
    $bad = ["content-type", "bcc:", "to:", "cc:", "href"];
    return str_replace($bad, "", $string);
}

function isInjected($str) {
    $injections = ['(\n+)', '(\r+)', '(\t+)', '(%0A+)', '(%0D+)', '(%08+)', '(%09+)'];
    return preg_match("/" . join('|', $injections) . "/i", $str);
}

/*--------------------------------------------------------------
 * Collect Form Data
 *------------------------------------------------------------*/
$recipient  = htmlspecialchars($_POST['recipient']);
$name       = $_POST['name'];
$email      = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$subject    = $_POST['subject'];
$inquiry    = $_POST['message'];
$user_ip    = getUserIP();
$digest     = "md5=" . base64_encode(hash("md5", $inquiry, true));
$date       = date(DateTime::RFC822);

/*--------------------------------------------------------------
 * Assign User ID by Recipient
 *------------------------------------------------------------*/
$recipients = [
    $recipient1 => 1,
    $recipient2 => 2,
    $recipient3 => 3
];
$user_id = $recipients[$recipient] ?? 0;

/*--------------------------------------------------------------
 * Compose Email Headers
 *------------------------------------------------------------*/
$headers  = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "Date: $date\r\n";
$headers .= "Digest: $digest\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

/*--------------------------------------------------------------
 * Load HTML Email Theme
 *------------------------------------------------------------*/
$theme_files = [
    1  => 'autumn_theme.php',
    2  => 'black_theme.php',
    3  => 'blue_theme.php',
    4  => 'cyan_theme.php',
    5  => 'dark_theme.php',
    6  => 'gold_theme.php',
    7  => 'green_theme.php',
    8  => 'grey_theme.php',
    9  => 'highcontrast_theme.php',
    10 => 'light_theme.php',
    11 => 'neon_theme.php',
    12 => 'orange_theme.php',
    13 => 'pink_theme.php',
    14 => 'purple_theme.php',
    15 => 'red_theme.php',
    16 => 'teal_theme.php',
    17 => 'violet_theme.php',
    18 => 'colorful_theme.php',
    19 => 'stylish_theme.php',
    20 => 'dark_gradient_theme.php',
    21 => 'navy_gradient_theme.php',
];

if (!array_key_exists($theme_number, $theme_files)) {
    $theme_number = 3; // Fallback to blue
}

include("themes/" . $theme_files[$theme_number]);

/*--------------------------------------------------------------
 * Save to Database
 *------------------------------------------------------------*/
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$stmt = $conn->prepare("INSERT INTO $DATABASE_TABLE (user_id, name, subject, email, message, user_ip) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $user_id, $name, $subject, $email, $inquiry, $user_ip);
$stmt->execute();
$stmt->close();
mysqli_close($conn);

/*--------------------------------------------------------------
 * Spam Prevention / Validation
 *------------------------------------------------------------*/

// Google reCAPTCHA
if (!$verify || !$verify->success) {
    header("Location: $error_page");
    exit;
}

// Basic checks
if (!isset($_POST['email'])) {
    header("Location: $feedback_page");
    exit;
} elseif (empty($name) || empty($email) || empty($subject) || empty($inquiry)) {
    header("Location: $error_page");
    exit;
} elseif (isInjected($email) || isInjected($name) || isInjected($subject) || isInjected($inquiry)) {
    header("Location: $ruaspammer");
    exit;
}

/*--------------------------------------------------------------
 * Send Email
 *------------------------------------------------------------*/
if (mail($recipient, $subject, $email_body, $headers)) {
    header("Location: $thankyou_page");
} else {
    header("Location: $error_page");
}
exit;
?>
