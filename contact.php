<?php

    require_once 'vendor/autoload.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('mail.azprotection.com.my', 587))
	  ->setUsername('webmailer@azprotection.com.my')
	  ->setPassword("webmailerpassword")
	;

	// variables start
	$firstname = "";
	$lastname = "";
    $phone = "";
    $email = ""; 
	$message = "";
	
	$firstname =  trim($_POST['contactfirstname']);
	$lastname =  trim($_POST['contactlastname']);
    $phone =  trim($_POST['contactphone']);
    $email =  trim($_POST['contactemail']);
	$newmessage =  trim($_POST['contactnewmessage']);
	// variables end

	$body = "<strong>From:</strong> $firstname &nbsp; $lastname <br/> <strong>Phone:</strong> $phone  <br/> <strong>Email:</strong> $email 
	    <br/><br/> <strong>Message:</strong> $newmessage";

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	// Create a message
	$message = (new Swift_Message('Client Inquiring from Website (Contact Us Page)'))
	  ->setFrom(['dominicteh@drimglobal.com' => 'Suree Website Contact Form'])
	  ->setTo(['dominicteh@drimglobal.com'])
	  ->setBody($body, 'text/html')
	  ;

	// Send the message
	// $result = $mailer->send($message);

	if ($mailer->send($message))
	{
	  header("Location: /index.html"); 
	  exit();
	}
	else
	{
	  echo "Failed\n";
	}

?>