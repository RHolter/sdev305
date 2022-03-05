<?php
// connect to database
$username = "rholterg_grcuser";
$password = "S3bastian!";
$hostname = "localhost";
$database = "rholterg_grc";

$cnxn = mysqli_connect($hostname, $username, $password, $database)
or die("<p>Oops! we weren't able to connect to the database.</p>");
