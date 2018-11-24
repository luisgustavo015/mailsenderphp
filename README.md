# mailsenderphp

#### Library of e-mail sender (using PHPMailer)

With that library you will be send e-mails easy through php scripts. You can parameter your prefered mail server to send e-mails over the SMTP protocol, with  SSL or TLS security and using SMTP authenticating.

For use this library you're need to install composer before, with command:

```sh
composer require luisg/notification
```

After install the library with composer, do you need to invoque the 'autoload' script provided by composer.

```sh
require __DIR__ . '/vendor/autoload.php';

use Notification\Email;
```

Now, steps to install the library are completed and you're ready to use this, in your source code, below the 'autoload' method of composer, create an instance of class Email.

```sh
$mail = new Email($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName);
```

Above, an example of the Email class instancied. For create the object $mail is required all these attributes. See an description about each of them:

 - $smtpDebug = Enable verbose debug output
 - $host = Specify main address of SMTP server
 - $user = SMTP username (for use SMTP authentication)
 - $pass = SMTP password (for use SMTP authentication)
 - $smtpSecure = Enable encryption, 'TLS' or 'SSL' are accepted
 - $port = TCP port used for SMTP mail server
 - $setFromEmail = When send email, the user that receives see this sender email
 - $setFromName = When send email, the user that receives see this sender name

After mehod Email are Instancied and these configurations properly completed, is necessary to call the method sendMail. Below an example of how to configure sendMail method:

```sh
$mail->sendMail($subject, $body, $replyEmail, $replyName, $addressEmail, $addressName);
```

For the method sendMail, see below the description of each attribute used:

 - $subject = Is the subject of message to send
 - $body = Is the body of email (message) to send
 - $replyEmail = Email that the destination will see and reply when he want
 - $replyName = Name that the destination will see when in reply
 - $addressEmail = Email of message destination
 - $addressName = Name of message destination

At this time was described all the steps to send email with this library, for elucidate well, in the next topic you're find the complete example of how to instance that library. 

# Complete Example

```sh
<?php

require __DIR__ . '/vendor/autoload.php';
use Notification\Email;

$mail = new Email(0, 'smtp.server.com', 'user@example.com', 'userpass', 'SSL', '587', 'myemail@example.com', 'My Name');

$mail->sendMail('Subject of Message!', 'Body of message.', 'myemail@example.com', 'My Name', 'destination@mail.com', 'Destination Name');
```

# Developers

* [Luis Gustavo Rangel] - PHP developer and contributor in a few Open Source projects.
* [PHPMailer] - Library to send email.

 [Luis Gustavo Rangel]: <https://github.com/luisgustavo015>
 [PHPMailer]: <https://github.com/PHPMailer/PHPMailer>