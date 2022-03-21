<?php

$username = "loremips_user";
$password = "loremips_password";
$hostname = "localhost";
$database = "loremips_polyclinic";

$connection = @mysqli_connect($hostname, $username, $password, $database)
or die("<p>Unable to connect to database. Please contact an administrator.</p>");
