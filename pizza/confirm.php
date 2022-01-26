<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/pizza styles.css">
    <title>Renee's Pizza</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/pizzaslice.png">

</head>

<body>
    <div id="main" class="container">
    <div class="jumbotron">
        <h1 class="display-4">Renee's Pizza</h1>
        <p class="lead">The BEST pizza GRC students have ever tasted.</p>
        <hr class="my-4">
        <p> Students in the SDEV305 get a free soda with a Medium Size Pizza. Add code SDEV305</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Contact Us</a>
    </div>




    <h1>Thank you for your order</h1>
    <h3>Order Summary</h3>
    <?php
     /*   echo "<pre>";
        var_dump($_GET);
        echo "</pre>";
     */
    // turn on error reporting
    // add these two lines to the top of the php pages
    ini_set('display_errors,1');
    error_reporting(E_ALL);

        // move form data into variables
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $method = $_POST['method'];
        $size = $_POST["size"];
        $comment = $_POST['comment'];
        $toppings = implode(", ", $_POST['toppings']);

        // display an Order Summary

        echo "<p>Name: $fname $lname </p>";
        echo "<p>Email: $email </p>";
        echo "<p>Method: $method </p>";
        echo "<p>Size: $size</p>";
        echo "<p>Comment: $comment</p>";
        echo "<p>Toppings: $toppings</p>";

        // define constants
        define("TAX_RATE",0.065);
        define("TOPPING_PRICE", 0.50);

        //get the number of toppings
        $numToppings = sizeof($_POST['toppings']);

        // calculate the price of the pizza
        $price = 0.0;
        if ($size == "small") {
            $price = 10.00;
        }
        elseif ($size == "medium"){
            $price = 15.00;
        }
        else {
            $price = 20.00;
        }

        // add cost of toppings
        $price = $price + ($numToppings * TOPPING_PRICE);
        // $price += $numToppings * TOPPING_PRICE;

        // Add sales tax
        $price += $price * TAX_RATE;

        // format price
        $price = number_format($price,2);

        // delivery fee

        if ($method == "delivery") {
            $price = $price + 5.00;
        }
        //Display result
        echo "<p>Total cost: $price </p>";
    ?>
</body>
</html>
