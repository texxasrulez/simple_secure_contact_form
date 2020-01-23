***Kontact PHP Mail Contact Form Mailer***


I am trying to build a simple, secure php mail contact form to integrate into existing HTML page.

This is a work in progress with many features I am planning on implementing.

Right now, you can specify a webiste URL and an image location to send a nice formatted email (Screenshot below) with URL link goodness to your webiste wrapped right in. This can be configured easily in main kontact.mail.php file. 

I did include within this script to try an determine the senders "TRUE" email address to email with message to easily copy/paste email address so one could add IP Address to blacklist with minimal effort or looking through logs if they are spammers to stop that unwanted behavior.

Check it out, give feedback and help out if you would like.


***Wanted Features (ATPIT):***
Addition of config.inc.php file for easier customization from lone file to edit.

Multiple Choices for Captcha Options

Custom Themed emails

Ability to echo output messages to existing HTML pages for ease and confort.

More ideas to come

Thank you and enjoy ... 


***Installation***:
Installation is quite simple. Upload included files with file structure preserved. Included .html pages should go to your webroot and edit those files accordingly to match your existing site look and feel. The files located in /kontact/ folder should upload into a folder named /kontact/ (I spelled it wrong on purpose) and edit kontact_mail.php file within the Configuration Section to suite your needs. You then need to add code depending on your choice of Captcha to your existing HTML page where the contact form is located. These code examples are more detailed within the kontact_mail.php file itself.

This script should work right out of the box, as long as you followed insturctions above, with Google ReCaptcha enabled featurng a Dark Blue Header/Footer with alternating light blue and white rows within a table. This is where the Custom Theme choices will come in for future features.


***Screenshot of Email***

![Alt text](/images/screenshot_dar_blue.png?raw=true "Dark Blue Theme")

