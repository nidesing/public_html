<?php 
session_start(); 
// Pear library includes
// You should have the pear lib installed
include_once('Mail.php');
include_once('Mail/mime.php');

//Email	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$ip = $_SERVER['REMOTE_ADDR'];
//IP Address




$your_email = 'mail@domain.tld';//<<--  update this to your email address

$errors ='';

		$to = $your_email;
		$subject="YOUR WEBSITE - Message via contact form! ";
		$from = $email;
	
	

		$text = 
		"<h2 style='border-bottom:solid 1px #CCC;'>Message via Contact Form</h2>
		Name:    -".$name."<br/><br/>
		Email:   -".$email."<br/><br/>
		Message: -".$message."<br/><br/>
		IP Address: -".$ip."<br/><br/>
        ";
		
		
		$message = new Mail_mime(); 
		$message->setHTMLBody($text); 
		$body = $message->get();
		$extraheaders = array("From"=>$from, "Subject"=>$subject,"Reply-To"=>$email);
		$headers = $message->headers($extraheaders);
		$mail = Mail::factory("mail");	
		if($mail->send($to, $headers, $body))
		{
			echo '<script>window.location = "thanks.html"</script>';
		} 
		else
		{ 
			echo "there's some errors to send the mail, verify your server options";
		}

///////////////////////////Functions/////////////////
// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
   }
  else
    {
    return false;
   }
}


?>


