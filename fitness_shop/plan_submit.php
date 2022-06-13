<?php
    session_start();
    //connecting to database
    require 'connection.php';

    //checking if session email is here or else this page won't load 
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }  

    //Retrieving info from posted form 
    $new_plan= $_POST['newPlan2'];
    $new_diet= $_POST['newDiet2'];
    $email=$_SESSION['email'];

        //saving new information in the database
        $update_password_query="update users set diet='$new_diet',plan='$new_plan' where email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        $_SESSION['diet']=$new_diet;
        $_SESSION['plan']=$new_plan;

        //informing that credentials have been modified
        echo "Your plan has been changed";

        //redirecting user to index page
        header('location:index.php');
?>
   