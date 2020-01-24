***Kontact PHP Mail Contact Form Mailer***

I am trying to build a simple, secure php mail contact form to integrate into existing HTML page.

This is a work in progress with many features I am planning on implementing.

Right now, you can specify a webiste URL and a logo image location to send a nice formatted email (Screenshot below) with URL link goodness to your webiste wrapped right in. This can be configured easily in main kontact_mail.php file. 

I did include within this script to try and determine the senders "TRUE" IP address. It is sent to the recipient you choose during configuration along with original Contact email so a webmaster could easily copy/paste that IP address and add it to blacklist with minimal effort and no need to look through logs to find that IP Address.

Check it out, give feedback and help out if you would like.


***Wanted Features (ATPIT):***

Addition of config.inc.php file for easier customization.

Multiple Choices for Captcha Options

Custom Themed/Colored emails

Ability to echo output messages to existing HTML pages for ease and confort.

More ideas to come

Thank you and enjoy ... 


***Installation***:
Installation is quite simple. Upload included files with file structure preserved. Included .html pages should go to your webroot and edit those files accordingly to match your existing site look and feel. The files located in /kontact/ folder should upload into a folder named /kontact/ (I spelled it wrong on purpose) and edit kontact_mail.php file within the Configuration Section to suite your needs. You then need to add code, depending on your choice of Captcha, to your existing HTML page where the contact form is located. These code examples are more detailed within the kontact_mail.php file itself.


***Screenshot of Email***

![Alt text](/images/screenshot.png?raw=true "ScreenShot")

This is obviously an image that has been altered since Rhona Mitra does not email me, but I did paste a Class C Private IP address over the actual IP Address used to send this test message to acurately show how the actual email address looks for privacy reasons. In my testing, this script has captured actual IP Addresses every time I have received SPAM, but it still hasn't gotten Rhona Mitra to use my code and correspond with me... :-(