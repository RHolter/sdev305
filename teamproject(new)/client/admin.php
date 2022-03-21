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
        <h1 class="text-center"> Admin Dashboard</h1>
    </div>

<!--    <nav class="navbar bg-primary navbar-dark navbar-expand-md">-->
<!--        <div id="menu" class="d-flex align-items-start">-->
<!--            <div class="navbar-nav" id="navbar">-->
<!--                <a class="nav-item nav-link" id="add" href="../formdev/add.html">Add</a>-->
<!--                <a class="nav-item nav-link" id="edit" href="../edit/edit.html">Edit</a>-->
<!--                <a class="nav-item nav-link" id="print" href="../display/index.php">Print</a>-->
<!--                <a class="nav-item nav-link" id="logout" href="../login/login.html">Log Out</a>-->
<!---->
<!----> 
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->

    <ul class="nav nav-tabs">
        <li class="nav-item hvr-grow-shadow">
            <a class="nav-link" href="../formdev/add.html">Add</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../display/admin_print.php">Print</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../login/logout.php">Log out</a>
        </li>
    </ul>

    <table class="table table-bordered table-hover" id="table">
        <thead class="thead-light">
        <tr>
            <th rowspan="2">Facility Name</th>
            <th rowspan="2">City & State</th>
            <th colspan="2">Medical Records</th>
            <th colspan="2">Film Library</th>
            <th rowspan="2">Types of Images</th>
            <th rowspan="2">Push Images?</th>
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

        $select = "SELECT * FROM polyclinic ORDER BY facility";
        $result = @mysqli_query($connection, $select);
        //var_dump($result);

        foreach ($result as $row) {
            //var_dump($row);
            $facility_id = $row['facility_id'];
            $facility = $row['facility'];
            $location = $row['location'];
            $medical_recordnum = $row['medical_recordnum'];
            $medical_recordfax = $row['medical_recordfax'];
            $film_librarynum = $row['film_librarynum'];
            $film_libraryfax = $row['film_libraryfax'];
            $pushable = $row['pushable'];
            $film_type = $row['film_type'];
            echo "<tr class='dataRow' data-toggle='modal' data-target='#formmodal'>
                    <th id=$facility_id>$facility</th>
                    <td>$location</td>
                    <td>$medical_recordnum</td>
                    <td>$medical_recordfax</td>
                    <td>$film_librarynum</td>
                    <td>$film_libraryfax</td>
                    <td>$film_type</td>
                    <td>$pushable</td>
                </tr>";
        }

        ?>
        </tbody>
    </table>

    <div class="modal fade" id="formmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form id="facility-form" action ="../edit/confirm.php" method="post">
                        <!-- ADMINDinput -->
                        <fieldset class="form-group">
                            <legend class="col-sm-2 pt-1">Facility Information</legend>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-class-label" for="fname">Facility Name</label>
                                    <input class="form-control" type="text" id="fname" name="fname" placeholder="Enter Facility's Name">
                                    <span class="err" id="err-fname">Please enter a Facility</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-class-label" for="location">Location</label>
                                    <input class="form-control" type="text" id="location" name="location" class="form-control" placeholder="Please enter City and State">
                                    <span class="err" id="err-location">Please enter a Location</span>
                                </div>
                            </div>
                            <!-- form groups -->
                            <div class="form-row">
                                <div class="form-groups col-md-6">
                                    <label class="form-class-label" for="fmrn">Medical Records Phone Number</label>
                                    <input type="text" id="fmrn" name="fmrn" class="form-control" placeholder="Enter phone number or N/A">
                                </div>
                                <div class="form-groups col-md-6">
                                    <label class="form-class-label" for="ffmrn">Medical Records Fax Number</label>
                                    <input type="text" id="ffmrn" name="ffmrn" class="form-control" placeholder="Enter phone number or N/A">
                                </div>
                            </div>

                            <!-- form groups -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-class-label" for="ffln">Film Library Number</label>
                                    <input type="text" id="ffln" name="ffln" class="form-control" placeholder="Enter phone number or N/A">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-class-label" for="fmrn">Film Library Fax Number</label>
                                    <input type="text" id="fflfn" name="fflfn" class="form-control" placeholder="Enter fax number or N/A">
                                </div>
                            </div>
                        </fieldset>

                        <!-- push radio buttons -->
                        <fieldset class="form-row">
                            <legend class="col-sm-2 pt-0">Films</legend>
                            <div class="form-group">
                                <label class="d-block">Are the images pushable?</label>
                                <div class="form-check-label form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="yes" name="push" value="Yes" checked>Yes
                                    </label>
                                </div> <!-- form groups -->

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="no" name="push" value="No">No
                                    </label>
                                </div>
                                <!-- form groups -->

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="no*" name="push" value="No*">No*
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <!-- form groups -->
                        <fieldset class="form-row">
                            <legend class="col-sm-2 pt-0">Film Types</legend>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="CT" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox1">CT</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="DEXA" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox2">DEXA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="MG" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox3">MG</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="MRI" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox4">MRI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="PATH" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox5">PATH</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="US" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox6">US</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="XR" name="film[]">
                                <label class="form-check-label" for="inlineCheckbox3">XR</label>
                            </div>
                        </fieldset>

                        <!--Submit button goes here -->
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
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
<script src="adminscript.js"></script>

<script>
    $('table').DataTable();
</script>
</body>
</html>
