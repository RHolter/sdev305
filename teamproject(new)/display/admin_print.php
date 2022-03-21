<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Export</title>

    <!--  Favicon  -->
    <link rel="icon" type="image/png" href="../images/Logo2.png">
</head>
<body>
<div class="container" id="container">
    <button class="button text-white bg-primary border rounded ms-auto" id="print" onclick="window.print()">Print</button>
    <button class="button text-white bg-primary border rounded ms-auto"  id="home" onclick="location.href='../client/admin.php'">Home</button>
    <table class="table table-bordered table-hover" id="table">
        <thead class="thead-light">
        <tr>
            <th rowspan="2">Facility Name</th>
            <th rowspan="2">City & State</th>
            <th colspan="2">Medical Records</th>
            <th colspan="2">Film Library</th>
            <th rowspan="2">Push Images?</th>
            <th rowspan="2">Types of Images</th>
        </tr>
        <tr>
            <th>Phone</th>
            <th>Fax</th>
            <th>Phone</th>
            <th>Fax</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $username = "loremips_user";
        $password = "loremips_password";
        $hostname = "localhost";
        $database = "loremips_polyclinic";

        $connection = @mysqli_connect($hostname, $username, $password, $database)
        or die("<p>Unable to connect to database. Please contact an administrator.</p>");

        $select = "SELECT facility, location, medical_recordnum, medical_recordfax,
        film_librarynum, film_libraryfax, pushable, film_type FROM polyclinic ORDER BY facility";
        $result = @mysqli_query($connection, $select);
        //var_dump($result);

        foreach ($result as $row){
            //var_dump($row);
            $facility = $row['facility'];
            $location = $row['location'];
            $medical_recordnum = $row['medical_recordnum'];
            $medical_recordfax = $row['medical_recordfax'];
            $film_librarynum = $row['film_librarynum'];
            $film_libraryfax = $row['film_libraryfax'];
            $pushable = $row['pushable'];
            $film_type = $row['film_type'];

            echo "<tr>
            <th>$facility</th>
            <td>$location</td>
            <td>$medical_recordnum</td>
            <td>$medical_recordfax</td>
            <td>$film_librarynum</td>
            <td>$film_libraryfax</td>
            <td>$pushable</td>
            <td>$film_type</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>