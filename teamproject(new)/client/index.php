<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Main Page</title>
    <link rel="stylesheet" href="main_style.css">

    <!--  Favicon  -->
    <link rel="icon" type="image/png" href="../images/Logo2.png">
</head>
<body>
<div class="container-md mx-1">
    <div class="jumbotron bg-white">
        <h1 class="text-center">Facility Main Dashboard</h1>
    </div>

<!--    <nav class="navbar bg-secondary navbar-dark navbar-expand-md mb-2">-->
<!--        <div id="menu" class="d-flex align-items-start">-->
<!--            <div class="active navbar-nav" id="navbar">-->
<!--                <img src="../images/Logo2.png" width="40" height="40" class="nav-item nav-link img-fluid">-->
<!--                <a class="nav-item nav-link" id="adminLogin" href="../login/login.html">Admin Login</a>-->
<!--                <a class="nav-item nav-link" id="print" href="../display/index.php">Print</a>-->
<!--                <a class="nav-item nav-link" id="userEdit" href="../useredit/useredit.html">User Suggestion</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
    <ul class="nav nav-pills nav-dark">
        <li class="nav-item">
            <a class="nav-link nav-link"  href="../login/login.php">Admin Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link" href="../display/index.php">Print</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link" href="../useredit/useredit.html">User Suggestion</a>
        </li>

    </ul>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="table">
            <thead class="thead-light">
            <tr>
                <th rowspan="2">Facility Name</th>
                <th rowspan="2">City & State</th>
                <th colspan="2">Medical Records</th>
                <th colspan="2">Film Library</th>
                <th rowspan="2">Push Images?</th>
                <th rowspan ="2">Types of Images</th>

            </tr>
            <tr>
                <th>Phone</th>
                <th>Fax</th>
                <th>Phone</th>
                <th>Fax</th>
            </tr>
            </thead>
            <tbody>
            <?php //Integrate database into table
            include('includes/connect.php');

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
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src='//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js'></script>

<script>
    $('table').DataTable();
</script>
</body>
</html>
