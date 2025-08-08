<?php
// Brown Theme
$email_body  = "<html><body>";
$email_body .= "<table width=700px; style='border: 1px solid #5c3a21;' cellpadding='10'>";
$email_body .= "<tr style='color: white; background: #5c3a21;'><td align='center' colspan='2'><a href='".$site_url."'><img src='". $site_url.$site_logo ."' align='left' height='45%'></a><font size='4'><strong>$form_title $form_name</strong></font></td></tr>";
$email_body .= "<tr style='background: #d7c3a3;'><td width=22%><strong>Name:</strong></td><td>".clean_string($name)."</td></tr>";
$email_body .= "<tr style='background: #f0eadc;'><td width=22%><strong>Email / IP Address:</strong></td><td>".clean_string($email)." / (<strong>$user_ip</strong>)</td></tr>";
$email_body .= "<tr style='background: #d7c3a3;'><td width=22%><strong><u>Subject</u>:</strong></td><td><strong><u>".clean_string($subject)."</u></strong></td></tr>";
$email_body .= "<tr style='background: #f0eadc;'><td width=22% valign='top'><strong>Message:</strong></td><td>".clean_string($inquiry)."</td></tr>";
$email_body .= "<tr style='color: white; background: #5c3a21;'><td align='right' colspan='2'><a href='".$site_url."' style='color: white; text-decoration: none;'>$site_name</a></td></tr>";
$email_body .= "</table></body></html>";
?>
