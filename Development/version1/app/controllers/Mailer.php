<?php

require_once('vendor/autoload.php');
require_once 'vendor/swiftmailer/swiftmailer/lib/swift_required.php';

class Mailer
{
    public function SendMail($tokenMessage)
    {
        $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        ->setUsername('xxxxxxx')
        ->setPassword('yyyyyyy');
        $message = Swift_Message::newInstance($transporter);
        $message->setTo(array('lawrence.lao26@gmail.com' => 'Lawrence Lao'));

        $message->setSubject('This email is sent using Swift Mailer');
        $messageBody = '<a href=http://localhost:8000/account/activation/'.$tokenMessage.'>Click here for activation</a>';
        $message->setBody($messageBody);
        $message->setFrom('donaldtomato@hotmail.com', 'myself');

        $mailer = Swift_Mailer::newInstance($transporter);
        try
        {
            $mailer->send($message);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }


        echo 'arraived';
    }
}

    