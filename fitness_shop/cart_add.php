<?php

    //Establishing a connection with database 
    require 'connection.php';
    session_start();

    //retrieving id of selected item/s from list 
    $item_id=$_GET['id'];

    //getting session id of user
    $user_id=$_SESSION['id'];

    //add to database all of the ordered products based on user id
    $add_query="insert into users_items(user_id,item_id,status) values ('$user_id','$item_id','Added to cart')";
    $add_to_cart_result=mysqli_query($con,$add_query) or die(mysqli_error($con));

    //redirecting to products page
    header('location: products.php');
?>