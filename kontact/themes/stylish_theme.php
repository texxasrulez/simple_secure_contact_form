<?php
// Custom Stylish Email Template
$email_body = "
<html>
<head>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f7f9fc;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 680px;
      margin: 20px auto;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      border-top: 6px solid #4a90e2;
    }
    .header {
      background-color: #4a90e2;
      color: #fff;
      padding: 16px 24px;
      text-align: center;
      font-size: 22px;
      font-weight: 600;
      letter-spacing: 1px;
    }
    .content {
      padding: 24px;
    }
    .row {
      margin-bottom: 18px;
    }
    .label {
      font-weight: 700;
      color: #4a90e2;
      margin-bottom: 6px;
      display: block;
      font-size: 14px;
      letter-spacing: 0.03em;
    }
    .value {
      background: #f0f4fa;
      border-radius: 6px;
      padding: 10px 14px;
      font-size: 15px;
      line-height: 1.4;
      color: #222;
      word-wrap: break-word;
    }
    .footer {
      background: #e8eaf6;
      color: #555;
      text-align: center;
      font-size: 13px;
      padding: 14px 20px;
      border-top: 1px solid #cfd8dc;
    }
    a.site-link {
      color: #4a90e2;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class='container'>
    <div class='header'>New Contact Message Received</div>
    <div class='content'>
      <div class='row'>
        <span class='label'>Name</span>
        <div class='value'>" . clean_string($name) . "</div>
      </div>
      <div class='row'>
        <span class='label'>Email</span>
        <div class='value'>" . clean_string($email) . "</div>
      </div>
      <div class='row'>
        <span class='label'>Subject</span>
        <div class='value'>" . clean_string($subject) . "</div>
      </div>
      <div class='row'>
        <span class='label'>Message</span>
        <div class='value' style='white-space: pre-wrap;'>" . clean_string($inquiry) . "</div>
      </div>
      <div class='row'>
        <span class='label'>IP Address</span>
        <div class='value'>" . $user_ip . "</div>
      </div>
    </div>
    <div class='footer'>
      This message was sent from <a href='" . $site_url . "' class='site-link'>" . $site_name . "</a>.
    </div>
  </div>
</body>
</html>
";
?>
