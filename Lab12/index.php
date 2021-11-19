<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
</head>
<body>
    <?php
        if(isset($_SESSION["user_id"])){
    ?>
    <h2 style="text-align: center; color: green;">
        Welcome <?php echo ucwords($_SESSION["user_name"]); ?>
    </h2>
    <p style="text-align: center">Your user id is <?php echo $_SESSION["user_id"]; ?></p>
    <?php
        }else{
    ?>
    <h2 style="text-align: center; color: red;">
        Login Failed
    </h2>
    <?php
        }
    ?>
</body>
</html>