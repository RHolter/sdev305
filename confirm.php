<?php
if(empty($_POST)){
    header('location: index.php');
}
include ('includes/connect.php');
include ("includes/header.html");


?>

<div id="main" class="container">
    <div class="jumbotron">
        <h1 class="display-4">Renee's Guestbook</h1>
        <p class="lead">Confirmation Summary</p>
        <hr class="my-4">
        <p>Leave me a comment by filling out the form below</p>
    </div>

<?php
ini_set('display_errors,1');
error_reporting(E_ALL);

    // move the form data into variables
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $linkedin = $_POST['linkedin'];
    $email = $_POST['email'];
    $meet = $_POST['meet'];
    $comment = $_POST['comment'];

// validate the data
$isValid = true;

// first name
if(!validName($_POST['fname'])){
    echo "<p>First Name is required</p>";
    $isValid = false;

} else {
    $fname = $_POST['fname'];
}

// last name
if(!validName($_POST['lname'])){
    echo "<p>Last Name is required</p>";
    $isValid = false;

} else {
    $fname = $_POST['lname'];
}

// linkedIn url
if(!validURL($_POST['linkedin']))
{
    echo "<p>LinkedIn URL is required</p>";
    $isValid = false;

} else {
    $fname = $_POST['linkedin'];

}

// email
if (!validEmail($_POST['email'])&& !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo "<p>Email is not valid</p>>";
    $isValid = false;
} else {
    $email = $_POST['email'];
}

if(!isset($_POST['meet'])){
    echo "<p>How we met is required</p>";
    $isValid = false;
} else {
    $meet = $_POST['meet'];
}
if(!validComment($_POST['comment'])){
    echo "<p>A comment of how we met is required</p>";
    $isValid = false;
} else {
    $comment = $_POST['comment'];
}

if (!$isValid == false){
    return;
}


//echo "<p>$sql</p>";
//display confirmation summary
echo "<p>Name: $fname $lname </p>";
echo "<p>LinkedIn URL: $linkedin </p>";
echo "<p>Email: $email </p>";
echo "<p>How We Met: $meet</p>";
echo "<p>Comment: $comment</p>";

$sql = "INSERT into guestbook (fname, lname,linkedin,email, meet, other)
            VALUES ('$fname','$lname','$linkedin', '$email','$meet','$comment')";

$success = mysqli_query($cnxn, $sql);
if(!$success){
    echo "<p>Something went wrong, please try again</p>";
    return;
}



//Display a summary

function thanks($name = "")
{
    $msg = "<h2>Thank you for your time";
    if($name != ""){
        $msg .= ", $name";
    }
    $msg .= "!</h2>";
    echo $msg;
    // echo "<h2>Thank you for your order, $name!</h2>";

}
include("includes/sendEmail.php");
?>
    </div>
</body>
</html>
