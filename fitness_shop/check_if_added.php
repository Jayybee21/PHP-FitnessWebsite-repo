<?php
    
    function check_if_added_to_cart($item_id){
        //session_start();    
        require 'connection.php';
        //retrieving id of selected item from list 
        $user_id=$_SESSION['id'];
        $check_query="select * from users_items where item_id='$item_id' and user_id='$user_id' and status='Added to cart'";
        $check_result=mysqli_query($con,$check_query) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>