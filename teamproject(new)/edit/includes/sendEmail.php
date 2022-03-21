<?php

// Filename: 305
//send email Poppa or whomever
$toEmail = "holter.renee@student.greenriver.edu"; // use your own
$fromName = "Add New";
$fromEmail = "LoreImps@gmail.com";
$subject = "Edit Request";
$headers = "From: $fromName <$fromEmail>";





$message = "Edit Request has been made. \n";


$success = mail($toEmail, $subject, $message, $headers);

if (!$success){
    echo "<p> There was a problem with the information. Please contact your admin</p>";
}

