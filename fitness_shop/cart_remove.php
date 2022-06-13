<?php

    //Establishing a connection with database 
    require 'connection.php';
    session_start();

    //retrieving id of selected item from list 
    $item_id=$_GET['id'];

    //getting session id of user
    $user_id=$_SESSION['id'];

    $find_item_query="select id from users_items where item_id='$item_id'";
    $find_item_result=mysqli_query($con,$find_item_query) or die(mysqli_error($con));
    $find_item_id=mysqli_fetch_array($find_item_result);
    $res = $find_item_id['id'];
     //delete querry depending on user id and item id 
    $delete_query="delete from users_items where user_id='$user_id' and id='$res'";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));

      //redirecting to cart page
    header('location: cart.php');
?>