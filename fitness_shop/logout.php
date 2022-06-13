<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fitness Store</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body style="background-color : #E8E8E8">
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
             <br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6" style="left:25%;">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h2>Success!</h2></div>
                            <div class="panel-body">
                                <h4>You have been logged out. <a href="login.php">Login again.</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
