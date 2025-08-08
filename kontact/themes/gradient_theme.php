<?php
// Gradient Dark Mode Email Template
$email_body = "
<html>
<head>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to top, #0a0a0a 0%, #2a2a2a 40%, #444 100%);
      color: #ddd;
    }
    .container {
      max-width: 700px;
      margin: 30px auto;
      background: linear-gradient(to bottom, #3a3a3a, #1a1a1a);
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
      overflow: hidden;
      border: 1px solid #555;
    }
    .header {
      background: linear-gradient(to bottom, #d1d1d1, #8a8a8a);
      color: #222;
      padding: 28px 32px;
      text-align: center;
      font-size: 26px;
      font-weight: 700;
      text-shadow: 0 2px 5px rgba(255, 255, 255, 0.3);
      letter-spacing: 1.1px;
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
      color: #a3a3a3;
      text-transform: uppercase;
      font-size: 13px;
      letter-spacing: 0.1em;
      margin-bottom: 6px;
      user-select: none;
    }
    .value {
      background: linear-gradient(135deg, #222, #111);
      border-radius: 8px;
      padding: 14px 18px;
      font-size: 16px;
      color: #eee;
      box-shadow: inset 0 2px 6px rgba(255, 255, 255, 0.07);
      word-wrap: break-word;
      white-space: pre-wrap;
      border: 1px solid #444;
      transition: background 0.3s ease;
      font-family: 'Courier New', Courier, monospace;
    }
    .value:hover {
      background: linear-gradient(135deg, #2a2a2a, #191919);
    }
    .footer {
      background: linear-gradient(to top, #1c1c1c, #2a2a2a);
      color: #777;
      font-size: 13px;
      padding: 18px 28px;
      text-align: center;
      border-top: 1px solid #444;
      user-select: none;
    }
    a.site-link {
      color: #bbb;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.25s ease;
    }
    a.site-link:hover {
      color: #fff;
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
      This message was sent from <a href='" . $site_url . "' class='site-link'>" . $site_name . "</a>.
    </div>
  </div>
</body>
</html>
";
?>
