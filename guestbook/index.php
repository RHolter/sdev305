<?php
include("includes/header.html");

?>
<!--PUt the jumbo jumbotron here make it fluid? mebbie -->

<div id="main" class="container-fluid">
    <div class="jumbotron">
        <h1 class="display-4">Renee's Guestbook</h1>
        <p class="lead">Welcome to my Guestbook</p>
        <hr class="my-4">
        <p>Sign my guestbook with how we met</p>
    </div>
    <nav class="navbar bg-primary navbar-dark navbar-expand-md">
        <div id="menu" class="d-flex align-items-start">
            <div class="navbar-nav" id="navbar">
                <a class="nav-item nav-link" id="index"href="admin.php">Admin Dashboard</a>
            </div>
        </div>
    </nav>

    <!--a pretty form goes here -->
    <form id="guest-form" action="confirm.php" method="post">

        <!-- Contact Info -->
        <fieldset class="form-group">
            <legend>Contact Info</legend>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label form="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">

                </div>
                <div class="form-group col-md-4">
                    <label form="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label form="title">Job Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Job Title">
                </div>
                <div class="form-group col-md-4">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label form="linkedin">LinkedIn URL</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="https://LinkedIn.com">


                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
        </fieldset>

        <!-- How we met  Drop downs!-->
        <fieldset class="form-group">
            <legend>How did we meet?</legend>
            <div class="form-group col-md-4">
                <label for="meet">How did we meet?</label>
                <select class="form-control" id="size" name="meet">
                    <option value="class" >In Class</option>
                    <option value="zoom">Zoom</option>
                    <option value="notyet">We haven't met yet</option>
                    <option value="other">Other</option>

                </select>
            </div>

            <div class="form-group col-md-4">
                <label form="comment">Tell me how we met:</label>
                <textarea type="text" class="form-control" rows="5" id="comment" name="comment"></textarea>

            </div>
        </fieldset>
        <!--Checkboxes and Radios -->

        <fieldset>
            <div class="form-group form-check col-md-4">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" checked="checked">Please add me to your mailing list
                </label>
            </div>
            <div class="form-check">
                <legend class=" col-sm-2 pt-0">Select Email Format</legend>
                <label class="form-check-label" for="html">
                    <input type="radio" class="form-check-input" id="html" name="method" value="html">HTML
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="plain">
                    <input type="radio" class="form-check-input" id="plain" name="method" value="plain">Plain Text
                </label>
            </div>

        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/guestbook.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


</body>
</html>