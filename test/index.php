<?php

require __DIR__ . '/../vendor/autoload.php';


use Notification\Email;


//Code for email sender form
$form = new stdClass();

$form->smtp_host = "";
$form->smtp_username = "";
$form->smtp_pass = "";
$form->smtp_encryption = "";
$form->smtp_port = "";
$form->from_name = "";
$form->from_email = "";
$form->to_name = "";
$form->to_email = "";
$form->to_subject = "";
$form->to_message = "";

$postArr = filter_input_array( INPUT_POST, FILTER_DEFAULT);

//If the POST receives  null value, the condition below don't pass
if($postArr){
    if(in_array("", $postArr)){
        echo "<p>In submited form exists null fields, please complete all the fields before submit again.</p>";
    }elseif(!filter_var($postArr['from_email'], FILTER_VALIDATE_EMAIL) || !filter_var($postArr['to_email'], FILTER_VALIDATE_EMAIL)){
        echo "<p>Error on submit: Your email or email of person you're send this message was filled wrong.</p>";
    }else{
        $novoEmail = new Email(
            $postArr['smtp_debug'],
            $postArr['smtp_host'],
            $postArr['smtp_username'],
            $postArr['smtp_pass'],
            $postArr['smtp_encryption'],
            $postArr['smtp_port'],
            $postArr['from_email'],
            $postArr['from_name']
        );

        $novoEmail->sendMail(
            $postArr['to_subject'],
            $postArr['to_message'],
            $postArr['from_email'],
            $postArr['from_name'],
            $postArr['to_email'],
            $postArr['to_name']
        );
        echo "<p>E-mail successfully send!</p>";
    }
}

?>

<form id="mailSend" name="mailSend" action="./" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>E-mail Server Configuration</legend>

        <br>

        <label>SMTP Debug:</label>
        <input type="text" name="smtp_debug" value="<?= $postArr['smtp_debug']; ?>" required/>

        <label>Host SMTP:</label>
        <input type="text" name="smtp_host" value="<?= $postArr['smtp_host']; ?>" placeholder="SMTP server" required/>

        <label>SMTP Username:</label>
        <input type="text" name="smtp_username" value="<?= $postArr['smtp_username']; ?>" placeholder="SMTP username" required/>

        <br><br>

        <label>SMTP Password:</label>
        <input type="password" name="smtp_pass" value="<?= $postArr['smtp_pass']; ?>" placeholder="SMTP password" required/>

        <label>SMTP Secure (encryption method):</label>
        <input type="text" name="smtp_encryption" value="<?= $postArr['smtp_encryption']; ?>" placeholder="Ex.:: 'tls' or 'ssl'" required/>

        <label>Port (TCP port of server):</label>
        <input type="text" name="smtp_port" value="<?= $postArr['smtp_port']; ?>" placeholder="Ex.:: '465' or '587' or '25' ..." required/>

        <br><br>

        <section>
            <p>SMTP Debug Setting:</p>
            <p>Value: 0 = DEBUG_OFF (Debug level for no output.)</p>
            <p>Value: 1 = DEBUG_CLIENT (Debug level to show client -> server messages.)</p>
            <p>Value: 2 = DEBUG_SERVER (Debug level to show client -> server and server -> client messages.)</p>
            <p>Value: 3 = DEBUG_CONNECTION (Debug level to show connection status, client -> server and server -> client messages.)</p>
            <p>Value: 4 = DEBUG_LOWLEVEL (Debug level to show all messages.)</p>
        </section>

        <br><br>
    </fieldset>

    <br>

    <fieldset>
        <legend>From</legend>

        <br>

        <label>Your Name:</label>
        <input type="text" name="from_name" value="<?= $postArr['from_name']; ?>" placeholder="Your name here..." required/>

        <label>Your E-mail:</label>
        <input type="email" name="from_email" value="<?= $postArr['from_email']; ?>" placeholder="Your email here..." required/>

        <br><br>
    </fieldset>

    <br>

    <fieldset>
        <legend>To</legend>

        <br>

        <label>To Name:</label>
        <input type="text" name="to_name" value="<?= $postArr['to_name']; ?>" placeholder="Name here..." required/>

        <label>To E-mail:</label>
        <input type="email" name="to_email" value="<?= $postArr['to_email']; ?>" placeholder="To email..." required/>

        <br><br>

        <label>Subject:</label>
        <input type="text" name="to_subject" value="<?= $postArr['to_subject']; ?>" placeholder="Subject of message..." required/>

        <br><br>

        <textarea name="to_message" cols="40" rows="5" placeholder="Your Message..." required><?= $postArr['to_message']; ?></textarea>

        <br><br>
    </fieldset>

    <br>
    <button type="submit" style="position: relative; left: 50%; transform: translateX(-50%);">Send Mail</button>
</form>

<br><hr><br>

<label style="display: block; text-align: center;">
    <p>Developed by <a target="_blank" href="https://github.com/luisgustavo015" title="GitHub">Luis Gustavo Rangel on GitHub</a></p>
    <p>Dependency library: <a target="_blank" href="https://github.com/PHPMailer/PHPMailer" title="GitHub PHPMailer">PHPMailer on GitHub</a> | <a target="_blank" href="https://packagist.org/packages/phpmailer/phpmailer" title="Packgist PHPMailer">PHPMailer on Packgist</a></p>
</label>

<br>