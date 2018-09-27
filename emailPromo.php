<?php

if (isset($_POST['email']))
{
    $email = $_POST['email'];
    $promoCode = $_POST['promoCode'];

    //echo"$email";

	$name = "Trashit Promo Code";
	$title = "Trashit Promo Code";
	$message = "Your promo code is: ".$promoCode;

	//Sanitize input data using PHP filter_var().
	$sender_name        = $name;
	$sender_email       = 'sonlkn1248014hipnkme@glknasd0914uoma.com';
	$message_content    = $message;

	//additional php validation
	if(strlen($message_content)<3) //check empty message
	{
		$output = json_encode(array('type'=>'error_message_content', 'text' => 'Message content is too short.'));
		//die($output);
	}
	if(strlen($sender_name)<3) // If length is less than 3 it will output JSON error.
	{
		$output = json_encode(array('type'=>'error_sender_name', 'text' => 'Provided name is too short.'));
		die($output);
	}
	if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		$output = json_encode(array('type'=>'error_sender_email', 'text' => 'E-mail format is incorrect.'));
		die($output);
	}

	/*------------------------------------*\
		E-mail send
	\*------------------------------------*/

	//Recipient email, Replace with own email here
	$to_email = $email;

	//email headers
	$headers  = "Content-type: text/html; charset=utf-8" . "\r\n";
	$headers .= "Reply-To: " . $sender_email . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();

	//email subject
	$message_subject = $sender_name . ".";

	//email content
	$message_body  = $message_content ;

	//send mail function
	$send_mail = mail($to_email, $message_subject, $message_body, $headers);


	//If mail couldn't be sent output error. Check your PHP email configuration.
	if(!$send_mail)
	{
		$output = json_encode(array('type'=>'error', 'text' => 'There was an error while sending message.'));
		echo"error";
		die($output);
	}
	else
	{
		$output = json_encode(array('type'=>'message', 'text' => 'Your spam emails have been sent successfully. Enjoy and relax!'));
	}

echo"Your promo code has been emailed to you.\n";

}
?>
