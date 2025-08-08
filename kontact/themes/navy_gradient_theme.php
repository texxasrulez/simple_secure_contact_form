<?php
// Gradient Navy Blue Theme (#152f40 based)
$email_body = "
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to top, #0d1b26 0%, #152f40 40%, #2e4b61 100%);
      color: #e3e9ef;
    }
    .container {
      max-width: 700px;
      margin: 30px auto;
      background: linear-gradient(to bottom, #1b3347, #0f202f);
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
      overflow: hidden;
      border: 1px solid #1e3a52;
    }
    .header {
      background: linear-gradient(to bottom, #406a88, #152f40);
      color: #ffffff;
      padding: 28px 32px;
      text-align: center;
      font-size: 26px;
      font-weight: bold;
      text-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
      letter-spacing: 1px;
      user-select: none;
    }
    .content {
      padding: 30px 36px;
    }
    .row {
      margin-bottom: 24px;
    }
    .label {
      font-weight: 700;
      color: #a5bfd6;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 0.1em;
      margin-bottom: 6px;
      user-select: none;
    }
    .value {
      background: linear-gradient(135deg, #1c3245, #112533);
      border-radius: 8px;
      padding: 14px 18px;
      font-size: 16px;
      color: #f0f4f8;
      box-shadow: inset 0 2px 6px rgba(255, 255, 255, 0.05);
      word-wrap: break-word;
      white-space: pre-wrap;
      border: 1px solid #2a4d68;
      font-family: 'Courier New', Courier, monospace;
      transition: background 0.3s ease;
    }
    .value:hover {
      background: linear-gradient(135deg, #213b51, #112533);
    }
    .footer {
      background: linear-gradient(to top, #132839, #1c3b51);
      color: #9fb6c6;
      font-size: 13px;
      padding: 18px 28px;
      text-align: center;
      border-top: 1px solid #2a4d68;
      user-select: none;
    }
    a.site-link {
      color: #c4d7e3;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s ease;
    }
    a.site-link:hover {
      color: #ffffff;
      text-decoration: underline;
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
        <div class='value'>" . clean_string($inquiry) . "</div>
      </div>
      <div class='row'>
        <span class='label'>IP Address</span>
        <div class='value'>" . $user_ip . "</div>
      </div>
    </div>
    <div class='footer'>
      Message sent from <a href='" . $site_url . "' class='site-link'>" . $site_name . "</a>
    </div>
  </div>
</body>
</html>
";
?>
