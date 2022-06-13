<?php
    //starting our session
    session_start();

    //retrieving other pages 
    require 'check_if_added.php';
    require 'connection.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fitness Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body style="background-color : #E8E8E8;">
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron" style="background-color : #404040; color : #F5F5F5;">
                    <h1>Our Meals!</h1>
                    <p>&nbsp Here's a full list of our available meals :</p>
                   </div>
            </div>
            <div class="container">
                 <?php 
                 $plan = "";
                 $diet = "";

                 //if user has not logged in, show all available plans
                    if(!isset($_SESSION['diet']) || !isset($_SESSION['plan'])){
                        $plan = "";
                        $diet = "";
                    }

                //otherwise, show user choices following his selected preferences in diet and plans
                else {
                 $user_diet=$_SESSION['diet'];
                 $user_plan=$_SESSION['plan'];
                 if($user_diet == "MeatEater"){
                     $diet = "";
                 }
                 else if ($user_diet == "Vegetarian"){
                     $diet = " and diet_type !='eater'";
                 }
                 else {
                      $diet = " and diet_type ='vegan'";
                 }
                if($user_plan == "Cutting"){
                     $plan = " and plan in ('cutting','any')";
                 }
                 else if ($user_plan == "Maintaining"){
                     $plan = "and plan in ('maintaining','any')";
                 }
                 else if ($user_plan == "Bulking"){
                     $plan = " and plan in ('bulking','any')";
                 }
                 else {
                      $plan = "";
                 }}

                    //retrieving our morning breakfast plans 
                    $morningDietPlans="select id,name,price,plan,calories,proteins,carbs,fats,diet_type from items where meal ='breakfast' $plan $diet";
                    $morningDietResults=mysqli_query($con,$morningDietPlans) or die(mysqli_error($con));
                    $morningDientResults=mysqli_query($con,$morningDietPlans) or die(mysqli_error($con));
                    //retrieving our afternoon lunch plans
                    $lunchDietPlans="select id,name,price,plan,calories,proteins,carbs,fats,diet_type from items where meal ='lunch' $plan $diet ";
                    $lunchDietResults=mysqli_query($con,$lunchDietPlans) or die(mysqli_error($con));
                    $lunchDientResults=mysqli_query($con,$lunchDietPlans) or die(mysqli_error($con));
                    //retrieving our evening dinner plans 
                    $dinnerDietPlans="select id,name,price,plan,calories,proteins,carbs,fats,diet_type from items where meal ='dinner' $plan $diet ";
                    $dinnerDietResults=mysqli_query($con,$dinnerDietPlans) or die(mysqli_error($con));
                    $dinnerDientResults=mysqli_query($con,$dinnerDietPlans) or die(mysqli_error($con));
                    //retrieving our evening dinner plans 
                    $snackDietPlans="select id,name,price,plan,calories,proteins,carbs,fats,diet_type from items where meal ='snack' $plan $diet ";
                    $snackDietResults=mysqli_query($con,$snackDietPlans) or die(mysqli_error($con));
                    $snackDientResults=mysqli_query($con,$snackDietPlans) or die(mysqli_error($con));
                   
                    ?>
                    <h1>Our Breakfasts</h1><br>

                    <?php
                    foreach ($morningDietResults as $data){
                        ?> 
                        <div class="col-md-3 col-sm-3">
                        <div class="thumbnail" >
                            <a href="cart.php"> 
                                <br><img src="img/<?php echo $data['id'] ?>.jpg " alt="Meal" style="width : 200px; height:175px; border-radius : 5px;">
                            </a>
                            <center>
                                <div class="caption" style ="height :275px;">
                                <h4><?php echo $data['name'] ?></h4>
                                <h3><?php echo $data['price'] ?> LBP</h3>
                                <p style ="color: #ff0000;">Calories: <?php echo $data['calories'] ?> | <?php echo $data['diet_type'] ?></p>
                                <p>Protein: <?php echo $data['proteins'] ?> | Carbs: <?php echo $data['carbs'] ?> | Fats: <?php echo $data['fats'] ?></p>
                                 <h3>For <?php echo $data['plan'] ?></h3><br>
                                <?php if(!isset($_SESSION['email'])){  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                                }
                                else{
                                    if(check_if_added_to_cart($data['id'])){
                                        echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                    }else{
                                        ?>
                                        <a href="cart_add.php?id=<?php echo $data['id']?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                        <?php
                                        }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                                    </div>
                                   
                        <?php
                    }
                    
                    ?>
                     </div>
                    <div class="container">
                    <br>
                    <h1>Our Lunches</h1><br>
                    <?php
                    foreach ($lunchDietResults as $data){
                        ?> 
                        <div class="col-md-3 col-sm-3">
                        <div class="thumbnail" >
                            <a href="cart.php">
                                <br><img src="img/<?php echo $data['id'] ?>.jpg " alt="Meal" style="width : 200px; height:175px; border-radius : 5px;">
                            </a>
                            <center>
                                <div class="caption" style ="height :275px;">
                                <h4><?php echo $data['name'] ?></h4>
                                <h3><?php echo $data['price'] ?> LBP</h3>
                                <p style ="color: #ff0000;">Calories: <?php echo $data['calories'] ?> | <?php echo $data['diet_type'] ?></p>
                                <p>Protein: <?php echo $data['proteins'] ?> | Carbs: <?php echo $data['carbs'] ?> | Fats: <?php echo $data['fats'] ?></p>
                                <h3>For <?php echo $data['plan'] ?></h3><br>
                                <?php if(!isset($_SESSION['email'])){  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                                }
                                else{
                                    if(check_if_added_to_cart($data['id'])){
                                        echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                    }else{
                                        ?>
                                        <a href="cart_add.php?id=<?php echo $data['id']?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                        <?php
                                        }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                                    </div>
                                   
                        <?php
                    }
                    ?>
                     </div>
                    <div class="container">
                    <br>
                    <h1>Our Dinners</h1><br>

                    <?php
                    foreach ($dinnerDietResults as $data){
                        ?> 
                        <div class="col-md-3 col-sm-3">
                        <div class="thumbnail" >
                            <a href="cart.php">
                                <br><img src="img/<?php echo $data['id'] ?>.jpg " alt="Meal" style="width : 200px; height:175px; border-radius : 5px;">
                            </a>
                            <center>
                                <div class="caption" style ="height :275px;">
                                <h4><?php echo $data['name'] ?></h4>
                                <h3><?php echo $data['price'] ?> LBP</h3>
                                <p style ="color: #ff0000;">Calories: <?php echo $data['calories'] ?> | <?php echo $data['diet_type'] ?></p>
                                <p>Protein: <?php echo $data['proteins'] ?> | Carbs: <?php echo $data['carbs'] ?> | Fats: <?php echo $data['fats'] ?>
                                <h3>For <?php echo $data['plan'] ?></h3><br>
                                <?php if(!isset($_SESSION['email'])){  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                                }
                                else{
                                    if(check_if_added_to_cart($data['id'])){
                                        echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                    }else{
                                        ?>
                                        <a href="cart_add.php?id=<?php echo $data['id']?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                        <?php
                                        }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                                    </div>
                            
                        <?php
                    }
                    ?>
                     </div>
                    <div class="container">
                    <br>
                    <h1>Our Snacks</h1><br>

                    <?php
                    foreach ($snackDietResults as $data){
                        ?> 
                        <div class="col-md-3 col-sm-3">
                        <div class="thumbnail" >
                            <a href="cart.php">
                                <br><img src="img/<?php echo $data['id'] ?>.jpg " alt="Meal" style="width : 200px; height:175px; border-radius : 5px;">
                            </a>
                            <center>
                                <div class="caption" style ="height :275px;">
                                <h4><?php echo $data['name'] ?></h4>
                                <h3><?php echo $data['price'] ?>LBP</h3>
                                <p style ="color: #ff0000;">Calories: <?php echo $data['calories'] ?> | <?php echo $data['diet_type'] ?></p>
                                <p>Protein: <?php echo $data['proteins'] ?> | Carbs: <?php echo $data['carbs'] ?> | Fats: <?php echo $data['fats'] ?></p>
                                <h3>For <?php echo $data['plan'] ?></h3><br>
                                <?php if(!isset($_SESSION['email'])){  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                                }
                                else{
                                    if(check_if_added_to_cart($data['id'])){
                                        echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                    }else{
                                        ?>
                                        <a href="cart_add.php?id=<?php echo $data['id']?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                        <?php
                                        }
                                        }
                                        ?>
                                </div>
                            </center>
                        </div>
                                    </div>
                        <?php
                    }
                    ?>
                    
        </div>
    </body>
</html>
