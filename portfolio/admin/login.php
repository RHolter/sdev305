<?php
/**
 *  File name & path
 *  Author
 *  Date
 *  Description
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//start the session
session_start();
// initialize the variables
$un = "";
$validLogin = true;

if(isset($_SESSION['username']))
{
    //redirect to homepage
    header('location: index.php');
}

// if user is already logged in
if(!empty($_POST)){
    //get the form data
    $un = $_POST['username'];
    $pw = $_POST['password'];

    // require credentials
    require('creds.php');

    if(array_key_exists($un,$logins) && $pw == $logins[$un]){
        $_SESSION['username'] =$un;

        $page= isset($_SESSION['page']) ? $_SESSION['page']: "index.php";
        header('location: '.$page);

    }

    //invalid login
    $validLogin = false;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $un; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <?php
        if(!$validLogin){
            echo "<p class='err'>Incorrect login</p>";
        }
        ?>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>