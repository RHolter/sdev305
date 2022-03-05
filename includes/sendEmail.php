<?php
$toEmail = "holter.renee@student.greenriver.edu"; // use your own
$fromName = "Renee's Guestbook";
$fromEmail = "reneesguest@gmail.com";
$subject = "New comment left";
$headers = "From: $fromName <$fromEmail>";

$message = "A new comment has been left. \n";
$message = $message . "Name: $fname $lname";
$message .= "Toppings: $toppings";

$success = mail($toEmail, $subject, $message, $headers);

?>