<?php

require_once('vendor/autoload.php');
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';

class Mailer
{
    public function SendMail($tokenMessage, $toEmailAddress)
    {
        $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        //$transporter = Swift_SmtpTransport::newInstance('mail.codingarsenal.com', 25)
        ->setUsername('portfoliorepo.lawrence@gmail.com') // replace 'xxxxxxx' to you actual email account user name;
        ->setPassword('myrepo.com'); // replace 'yyyyyyy' to you actual email account password;
        $message = Swift_Message::newInstance($transporter);
        $message->setTo(array($toEmailAddress => 'Email Confirmation'));

        $message->setSubject('This email is sent using Swift Mailer');
        $messageBody = '<a href="http://localhost:8000/'.$tokenMessage.'">Click here for activation</a>';
        $message->setBody($messageBody, 'text/html');
        $message->setFrom('laravel_A1@ssdp.com', 'myself');

        $mailer = Swift_Mailer::newInstance($transporter);
        try
        {
            $mailer->send($message);
            //die('sent');
        }
        catch(Exception $e)
        {
            //echo $e->getMessage();
            die($e->getMessage());
        }
    }
}

    