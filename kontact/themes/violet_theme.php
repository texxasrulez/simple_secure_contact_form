<?php
	$message  = "<html><body>";
	$message .= "<table width=700px; style='border: 1px solid #3f1a67;' cellpadding='10'>";
	$message .= "<tr style='color: white; background: #3f1a67;'><td align='center' colspan='2' text-align:'bottom'><a href=".$site_url."><img src=". $site_url.$site_logo ." align='left' height=45%></a><font size='4'><strong>" . $form_title . " " . $form_name . "</strong></font></td></tr>";
	$message .= "<tr style='background: #ddbbe4;'><td width=22%><strong>Name:</strong></td><td>" .clean_string($name) . "</td></tr>";
	$message .= "<tr style='background: #eeddf1;'><td width=22%><strong>Email / IP Address: </strong></td><td>" .clean_string($email) . " <strong>/</strong> (<strong>" . $user_ip . "</strong>) " . "</td></tr>";
	$message .= "<tr style='background: #ddbbe4;'><td width=22%><strong><u>Subject</u>: </strong></td><td><strong><u>" .clean_string($subject) . "</u></strong></td></tr>";
	$message .= "<tr style='background: #eeddf1;'><td width=22% valign='top'><strong>Message: </strong></td><td>" .clean_string($inquiry) . "</td></tr>";
	$message .= "<tr style='color: white; background: #3f1a67;'><td align='right' colspan='2'><a href=". $site_url ." . style='color: white; text-decoration: none'>" . $site_name . "</a></td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";
?>
