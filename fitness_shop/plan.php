<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fitness Store</title>
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
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1>Change Plan / Diet:</h1>
                        <br><br>
                        <form method="post" action="plan_submit.php">
                            <h4>Change Plan: </h4>
                            <select name ="newPlan2" style="width:360px; height :40px;" required>
                            <option value="<?php echo $_SESSION['plan'] ?>"><?php echo $_SESSION['plan'] ?></option>
                             <option value="Any">Any</option>
                             <option value="Bulking">Bulking</option>
                             <option value="Maintaining">Maintaining</option>
                             <option value="Cutting">Cutting</option>
                            </select>
                            <br><br><br>
                             <h4>Change Eating Diet:</h4>
                             <select name ="newDiet2" style="width:360px; height :40px;" required>
                             <option value="<?php echo $_SESSION['diet'] ?>"><?php echo $_SESSION['diet'] ?></option>
                             <option value="Vegan">Vegan</option>
                             <option value="Vegetarian">Vegetarian</option>
                             <option value="MeatEater">MeatEater</option>
                            </select>
                             <br> <br>
                             <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
