<?php
include("includes/header.html");

?>
<!--PUt the jumbo jumbotron here make it fluid?  -->

<div id="main" class="container-md mx-5">
    <div class="jumbotron">
        <h1 class="display-4">Renee's Guestbook</h1>
        <p class="lead">Admin Dashboard</p>
        <hr class="my-4">
        <p></p>
    </div>

    <nav class="navbar bg-primary navbar-dark navbar-expand-md">
        <div id="menu" class="d-flex align-items-start">
            <div class="navbar-nav" id="navbar">
                <a class="nav-item nav-link" id="index"href="index.php">Home</a>
            </div>
        </div>
    </nav>
    <table>
        <thead>
           <tr>
               <th>First Name</th>
               <th>Last Name</th>
               <th>LinkedIn URL</th>
               <th>Email</th>
               <th>How We Met</th>
               <th>Comment</th>
           </tr>
        </thead>
        <tbody>
        <?php
        include('includes/connect.php');
        $select = "SELECT order_id, fname, lname, linkedin, email, meet, comment FROM guestbook
                  order by order_id";
        $result = @mysqli_query($cnxn, $select);

        foreach ($result as $row){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $linkedin = $row['linkedin'];
            $email = $row['email'];
            $meet = $row['meet'];
            $comment= $row['comment'];

            echo "<tr>
                    <th>$fname</th>
                    <td>$lname</td>
                    <td>$linkedin</td>
                    <td>$email</td>
                    <td>$meet</td>
                    <td>$comment</td>
                    </tr>";

        }

        ?>
        </tbody>
    </table>





</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/guestbook.js"></script>
<script src='//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js'></script>

<script>
    $('table').DataTable();
</script>

    </body>
</html>
