<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fitness Store</title>
     <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
 
    </head>
    <body style = "background-image: url('img/bc-ind.png');">
        <div>
           <?php
            require 'header.php';
           ?>
           <br><br><br><br><br>
            <div class="container">
                <center>
                <div class="col-xl-8" style="left:25%;background-color:#404040; border-radius : 15px; color:#F5F5F5 ;">
                <br><br>
                <h1>Meal Plans</h1>
                <br>
                <h3>Specially made for you! We have plans for Cutting, Maintaing and Bulking</h3>
                <br><br>
                <a href="products.php" class="btn btn-primary" style="width : 20%; font-size: 20px;">Start Browsing</a>
                <br><br><br><br>
                   </center>
                </div>
            </div>
         </div>
    </body>
</html>