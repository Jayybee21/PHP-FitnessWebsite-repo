<?php

    //calling database 
    require 'connection.php';
    session_start();
    
    //retrieving posted content, email and password 
    $name= $_POST['name'];
    $password= $_POST['password'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $diet=$_POST['diet'];
    $plan=$_POST['plan'];

    //checking if db already has user 
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));

    //getting number of rows returned
    $rows_fetched=mysqli_num_rows($duplicate_user_result);

    //if rows have been returned than user must already be in db 
    if($rows_fetched>0){
?>
        <script>
            window.alert("Email already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />

<?php
    }
    else{
        //else we save new user info to our database
        $user_registration_query="insert into users(name,email,password,contact,city,address,diet,plan) values ('$name','$email','$password','$contact','$city','$address','$diet','$plan')";
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "User successfully registered";

        //populating our sessions
        $_SESSION['diet']=$diet;
        $_SESSION['plan']=$plan;
        $_SESSION['email']=$email;
        $_SESSION['id']=mysqli_insert_id($con);

        //redirecting to index page
        header('location:index.php');
         }
?>