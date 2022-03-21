<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Confirmation Summary</title>

    <!--  Favicon  -->
    <link rel="icon" type="image/png" href="../images/Logo2.png">

    <div class="jumbotron">
        <h1 class="display-4">Edit/Update Facility</h1>
        <p class="lead">Edit/Update Information</p>
        <hr class="my-4">
        <p>If this is correct, please click on add</p>
    </div>
</head>
<body>

<div class="container">
    <?php
    require ('../formdev/includes/functions.php');
    ini_set('display_errors,1');
    error_reporting(E_ALL);

    // display  variables
    $facility_id = $_GET['facility_id'];
    $fname = $_POST['fname'];
    $floc = $_POST['location'];
    $fmrn = $_POST['fmrn'];
    $ffmrn= $_POST['ffmrn'];
    $ffln = $_POST['ffln'];
    $fflfn = $_POST['fflfn'];
    $push= $_POST['push'];
    $film= implode(", ", $_POST['film']);

    //echo "Facility ID: $facility_id";

    //start form validation
    $isValid = true;

    if (!empty($_POST['fname'])) { //validate facility name
        $fname = $_POST['fname'];
    } else {
        echo "<p>A facility name is required</p>";
        $isValid = false;
    }

    if (!empty($_POST['location'])) { //validate location
        $pattern = "/[a-z],[a-z]/";
        if (preg_match($pattern, $_POST['location']) != 1) {
            $floc = $_POST['location'];
        } else {
            echo "<p>A location is required.</p>";
            $isValid = false;
        }
    }

    //validate facility phone & fax
    if (!empty($_POST['fmrn'])){
        if (empty($_POST['ffmrn'])){
            echo "<p>Film Library Phone Number <em>and</em> Fax are required.</p>";
            $isValid = false;
        }
        else {
            $fmrn = $_POST['fmrn'];
            $ffmrn = $_POST['ffmrn'];
        }
    }

    //validate film library phone & fax
    if (!empty($_POST['ffln'])){
        if (empty($_POST['fflfn'])){
            echo "<p>Film Library Phone Number <em>and</em> Fax are required.</p>";
            $isValid = false;
        }
        else {
            $ffln = $_POST['ffln'];
            $fflfn = $_POST['fflfn'];
        }
    }

    //check if all phone num. fields are blank
    if (empty($_POST['fmrn']) && empty($_POST['ffmrn']) && empty($_POST['ffln']) && empty($_POST['fflfn'])) {
        echo "<p>A phone number and fax must be provided.</p>";
        $isValid = false;
    }

    $pushOptions = getPush(); //get valid push options
    if (in_array($_POST['push'], $pushOptions)) { //check if submitted option is in push array
        $push = $_POST['push'];
    } else {
        echo "<p>Please pick if the facility can push images.</p>";
        $isValid = false;
    }

    //Start validating film options

    if (validFilm($_POST['film'])) { //check if film is valid
        $films = implode(", ", $_POST['film']);
    } else {
        echo "<p>This form has been spoofed.</p>";
        $isValid = false;
    }

    if ($isValid == false) {
        echo "<p>Please go back to the Admin Dashboard.</p>";
        return;
    }


    //display confirmation summary
    echo "<p>Facility: $fname</p>";
    echo "<p>Facility Location: $floc</p>";
    echo "<p>Medical Records: $fmrn</p>";
    echo "<p>Medical Records Fax: $ffmrn</p>";
    echo "<p>Film Library: $ffln</p>";
    echo "<p>Film Library Fax: $fflfn</p>";
    echo "<p>Pushable?  $push</p>";
    echo "<p>Film Types: $film</p>";

    include ("includes/sendEmail.php");
    include("../client/includes/connect.php");

    $sql ="update polyclinic set facility ='$fname', location ='$floc', medical_recordnum='$fmrn', medical_recordfax ='$ffmrn',
           film_librarynum = '$ffln', film_libraryfax='$ffln', pushable ='$push', film_type ='$film'
           WHERE facility_id = '$facility_id'";

    //echo $sql;

    $success = mysqli_query($connection, $sql);
    echo $success ? "<p>Update Successful!</p>" : "<p>Update Failed, please contact an Administrator.</p>"; // check if row is updated

    // connect to database
    $username = "loreimps_grcuser";
    $password = "LoreImps2022";
    $hostname = "localhost";
    $database = "loreimps_polyclinic";

    mysqli_connect($hostname, $username, $password, $database);

    ?>

    <button class="item text-white bg-primary border rounded" onclick="location.href='../client/admin.php'">Add</button>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>