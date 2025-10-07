# A Simple yet Secure Contact form

[![Packagist](https://img.shields.io/packagist/dt/texxasrulez/simple_secure_contact_form?style=plastic)](https://packagist.org/packages/texxasrulez/simple_secure_contact_form)
[![Packagist Version](https://img.shields.io/packagist/v/texxasrulez/simple_secure_contact_form?style=plastic&logo=packagist&logoColor=white)](https://packagist.org/packages/texxasrulez/simple_secure_contact_form)
[![Project license](https://img.shields.io/github/license/texxasrulez/simple_secure_contact_form?style=plastic)](https://github.com/texxasrulez/simple_secure_contact_form/LICENSE)
[![GitHub stars](https://img.shields.io/github/stars/texxasrulez/simple_secure_contact_form?style=plastic&logo=github)](https://github.com/texxasrulez/simple_secure_contact_form/stargazers)
[![issues](https://img.shields.io/github/issues/texxasrulez/simple_secure_contact_form?style=plastic)](https://github.com/texxasrulez/simple_secure_contact_form/issues)
[![Donate to this project using Paypal](https://img.shields.io/badge/paypal-donate-blue.svg?style=plastic&logo=paypal)](https://www.paypal.me/texxasrulez)

***Kontact PHP Mail Contact Form Mailer***

I am trying to build a simple, secure php mail contact form to integrate into existing HTML page.

This is a work in progress with many features I am planning on implementing.

**New** A config.inc.php file is now included to make all changes necessary to personalize to ones site. As of now, one can specify a webiste URL and a logo image location to send a nice formatted email (Screenshot below) with URL link goodness to your webiste wrapped right in. You can specify different color themes by editing the config.inc.php file located within this repo. This kontact form can now save to databases to keep a record of inquiries recieved. 

I did include within this script to try and determine the senders "TRUE" IP address. It is sent to the recipient you choose during configuration along with original Contact email so a webmaster could easily copy/paste the IP address of a known spammer and add it to blacklist with minimal effort with no need to look through logs to find that IP Address.

Check it out, give feedback and help out if you would like.

***Wanted Features:***

* Multiple Choices for Captcha Options
* Ability to echo output messages to existing HTML pages for ease and comfort.
* Auto addition of Known Spammer IP Address to blacklist.

More ideas to come

Thank you and enjoy ... 

***Installation***: \
Installation is quite simple. Create your database and import scheme located in SQL folder. Upload included files with file structure preserved to the root of your webserver. Included .html pages should go to your webroot and edit those files accordingly to match your existing site look and feel. The files located in /kontact/ folder should upload into a folder named /kontact/ (I spelled it wrong on purpose) and edit config.inc.php file within the Configuration Folder to suite your needs. You then need to add code, depending on your choice of Captcha, to your existing HTML page where the contact form is located. These code examples are more detailed within the send_mail.php file itself.

***Screenshot of Email***

![Alt text](images/screenshot.png?raw=true "ScreenShot")

This is obviously an image that has been altered since Rhona Mitra does not email me, but I did paste a Class C Private IP address over the actual IP Address used to send this test message, for privacy reasons, to accurately represent the look you should expect from stock script. In my testing, this script has captured actual IP Addresses every time I have received SPAM, but it still hasn't gotten Rhona Mitra to correspond with me... :-(

:moneybag: **Donations** :moneybag:

If you use this plugin and would like to show your appreciation by buying me a cup of coffee, I surely would appreciate it. A regular cup of Joe is sufficient, but a Starbucks Coffee would be better ... \
Zelle (Zelle is integrated within many major banks Mobile Apps by default) - Just send to texxasrulez at yahoo dot com \
No Zelle in your banks mobile app, no problem, just click [Paypal](https://paypal.me/texxasrulez?locale.x=en_US) and I can make a Starbucks run ...
