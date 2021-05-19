<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $POST['message'];

  $email_from = 'yourname@yourwebsite.com';
  $email_subject = "New Form submission";
  $email_body = "You received a new message from $name. \n".
  "Here is the message:\n
  $message".

  $to= "crazyguy78@hotmail.com";
  $header = "From: $email_from \r\n";
  $header .="Reply-To: $visitor_email \r\n";
  mail($to,$email_subject,$email_body,$headers);
?>