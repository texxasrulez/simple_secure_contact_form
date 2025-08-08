<?php
// Colorful Classy Theme
$email_body  = "<html><body>";
$email_body .= "<table width='700px' style='border: 1px solid #6C3483; font-family: Arial, sans-serif;' cellpadding='10'>";

// Header
$email_body .= "<tr style='background: #6C3483; color: white;'>";
$email_body .= "<td align='center' colspan='2'>";
$email_body .= "<a href='" . $site_url . "'><img src='" . $site_url . $site_logo . "' align='left' height='45%'></a>";
$email_body .= "<font size='4'><strong>" . $form_title . " " . $form_name . "</strong></font>";
$email_body .= "</td></tr>";

// Row 1 - Name
$email_body .= "<tr style='background: #FADBD8; color: #5B2C6F;'>";
$email_body .= "<td width='22%'><strong>Name:</strong></td><td>" . clean_string($name) . "</td></tr>";

// Row 2 - Email / IP
$email_body .= "<tr style='background: #D5F5E3; color: #1E8449;'>";
$email_body .= "<td><strong>Email / IP Address:</strong></td>";
$email_body .= "<td>" . clean_string($email) . " <strong>/</strong> (<strong>" . $user_ip . "</strong>)</td></tr>";

// Row 3 - Subject
$email_body .= "<tr style='background: #FCF3CF; color: #9A7D0A;'>";
$email_body .= "<td><strong><u>Subject</u>:</strong></td><td><strong><u>" . clean_string($subject) . "</u></strong></td></tr>";

// Row 4 - Message
$email_body .= "<tr style='background: #D6EAF8; color: #154360;' valign='top'>";
$email_body .= "<td><strong>Message:</strong></td><td>" . clean_string($inquiry) . "</td></tr>";

// Footer
$email_body .= "<tr style='background: #6C3483; color: white;'>";
$email_body .= "<td align='right' colspan='2'>";
$email_body .= "<a href='" . $site_url . "' style='color: white; text-decoration: none;'>" . $site_name . "</a>";
$email_body .= "</td></tr>";

$email_body .= "</table>";
$email_body .= "</body></html>";
?>
