<?php
//calling database 
    require 'connection.php';
    session_start();

    //retrieving posted content, email and password 
    $email=$_POST['email'];
    $password= $_POST['password'];

    //creating querry to see if user exists
    $user_authentication_query="select id,email,diet,plan from users where email='$email' and password='$password'";
    $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        ?>
        <script>
            window.alert("Wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['diet']=$row['diet'];
        $_SESSION['plan']=$row['plan'];
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];  //user id
        header('location: index.php');
    }
    
 ?>