<?php

    //starting session
    session_start();
    //calling database connection
    require 'connection.php';

    //preventing user from entering page if he is not logged in yet 
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }

    //retrieving user id from saved session
    $user_id=$_SESSION['id'];

    //querry that joins table users and users_items to find the products of user based on his id 
    $products_query="select it.id,it.name,it.price from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id'";
    $products_result=mysqli_query($con,$products_query) or die(mysqli_error($con));
    //also fetching number of rows returned
    $no_of_products= mysqli_num_rows($products_result);
    $sum=0;
    //if no rows have been returned
    if($no_of_products==0){
    ?>
        <script>
        window.alert("No items in the cart!!");
        </script>
    <?php
    //else populate users' products on table
    }else{
        while($row=mysqli_fetch_array($products_result)){
            //increasing sum value whenever a new product is retrieved from database
            $sum=$sum+$row['price']; 
       }
    }
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
    <body style="background-color : #E8E8E8">
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
            <div class="container">
                <table class="table table-bordered" style="background-color: #383838; color : #F5F5F5;">
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       //launching joined table querry
                        $products_result=mysqli_query($con,$products_query) or die(mysqli_error($con));
                        //getting the overall number of results 
                        $no_of_products= mysqli_num_rows($products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($products_result)){
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th><th><?php echo $row['name']?></th><th><?php echo $row['price']?></th>
                            <th><a style="color: #FF0000;"href='cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th><th>Total</th><th>LBP <?php echo $sum;?></th><th><a href="success.php?id=<?php echo $user_id?>" class="btn btn-success">Confirm Order</a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
