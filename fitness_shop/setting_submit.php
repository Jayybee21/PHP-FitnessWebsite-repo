<?php
    session_start();
    //connecting to database
    require 'connection.php';

    //checking if session email is here or else this page won't load 
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }  

    //Retrieving info from posted form 
    $old_password= $_POST['oldPassword'];
    $new_password= $_POST['newPassword'];
    $new_plan= $_POST['newPlan'];
    $new_diet= $_POST['newDiet'];
    $email=$_SESSION['email'];

    //creating a simple querry to retrieve current user
    $password_from_database_query="select password from users where email='$email'";

    //fetching database result
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);

    //if old password matches the retrieved email 
    if($row['password']==$old_password){
        //saving new information in the database
        $update_password_query="update users set password='$new_password',diet='$new_diet',plan='$new_plan' where email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        $_SESSION['diet']=$new_diet;
        $_SESSION['plan']=$new_plan;
        //informing that credentals have been modified
        echo "Your password has been updated.";
        //redirecting user to index page
        header('location:index.php');
        ?>
        <?php
    }else{
        //if password does not match the email retrieved from the database 
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
        <?php
        //returning user back to settings page
        header('location:settings.php');
    }
?>