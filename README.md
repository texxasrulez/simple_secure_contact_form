***Kontact PHP Mail Contact Form Mailer***


I am trying to build a simple, secure php mail contact form to integrate into existing HTML page.

This is a work in progress with many features I am planning on implementing.

Right now, you can specify a webiste URL, image location and it will format a nice little Table with image (Screenshot below) and link goodness to your webiste wrapped right in and configured easily in main php file. Adding config.inc.php is in the works when I add more features to this script in the future.

I did include within this script to try an determine the senders "TRUE" email address to email with message to easily copy/paste email address so one could add IP Address to blacklist with minimal effort or looking through logs if they are spammers to stop that unwanted behavior.

Check it out, give feedback and help out if you would like.


***Wanted Features (ATPIT):***

Multiple Choices for Captcha Options

Skinable emails

***Screenshot of Email***

![Alt text](/images/screenshot_dar_blue.png?raw=true "Dark Blue Theme")


More ideas to come

Thank you and enjoy ... 


***Installation***:
Installation is quite simple. Copy included .html pages to your webroot, edit accordingly to match your existing site look and upload rest of content into a folder named kontact (I spelled it wrong on purpose) and edit kontact_mail.php according to your needs. It should work right out of the box with Google ReCaptcha (as long as you go get your keys) and a Dark Blue / Light Blue table formatted themed email sent to the email of your choice.
