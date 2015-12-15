<?php

    include_once "lib/swift_required.php";

    $subject = 'Hello from Mandrill, PHP!';
    $from = array('ron@innitech.com' => 'Ron Brasher');
    $to = array('ron@innitech.com' => 'Ron Brasher');
    
    $text = 'Mandrill speaks plain text';
    $html = "<em>Mandrill speaks <strong>HTML</strong></em>";
    
    $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
    $transport->setUsername('matt@innitech.com');
    $transport->setPassword('oDCDUo9PxJxJgXETp3UgiQ');
    $swift = Swift_Mailer::newInstance($transport);
    
    $message = new Swift_Message($subject);
    $message->setFrom($from);
    $message->setBody($html, 'text/html');
    $message->setTo($to);
    $message->addPart($text, 'text/plain');
    
    if($recipients == $swift->send($message, $failures)) {
        return true;
    } else {
        echo "There was an error:\n";
        print_r($failures);
    }
            
            
    //check if fields passed are empty
//    if(empty($_POST['name']) || (empty($_POST['phone'])) || (empty($_POST['email'])) || (empty($_POST['message'])) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//        echo "No arguments provided";
//        return false;
//    }
//    
//    $name = $_POST['name'];
//    $phone = $_POST['phone'];
//    $email = $_POST['email'];
//    $message = $_POST['message'];
//    
//    //create email body and send it
//    $to = 'ron@innitech.com';
//    $email_subject = "NG Innitest Contact Form: $name";
//    $email_body = "You have received a new message from your website's contact form.\n\n" .
//            "Here are the details:\n\n" .
//            "Name: $name\n\n" .
//            "Phone: $phone\n\n" .
//            "Email: $email\n\n" .
//            "Message: $message";
//    $headers = "From: noreply@your-domain.com\n";
//    $headers .= "Reply-To: $email_address";
//    
//    mail($to, $email_subject, $email_body, $headers);
//    
//    return true;
?>