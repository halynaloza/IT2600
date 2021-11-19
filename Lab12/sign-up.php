<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "it1150";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["submit"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email_address"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($check_sql) > 0){
        $error = "Email address already exists, please choose a unique one";
    }else{
        $insert_sql = mysqli_query($conn, "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password');");
        if($insert_sql){
            $msg = "User has been successfully added! Please <a href='login.php'>login</a>";
        }else{
            $error = "Something went wrong, please try again";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .flex{
            display: flex;
            justify-content: center;
        }
        .card{
            width: 400px;
            margin: 0 auto;
            background: rgb(243, 243, 243);
            padding: 30px 50px 30px 40px;
            border-radius: 5px;
        }
        .btn{
            padding: 10px 15px;
            background: rgb(0, 195, 255);
            border-radius: 3px;
            color: #fff;
            border: 0;
            font-size: 16px;
            cursor: pointer;
            width: 105%
        }
        input{
            padding: 10px 10px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid silver;
            background: rgb(223, 223, 223);
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">
        Sign Up
    </h2>
    <div class="card">
        <form action="" method="post">
            <?php if(isset($msg)){echo "<p style='color: green; text-align: center'>$msg</p>";} ?>
            <?php if(isset($error)){echo "<p style='color: red; text-align: center'>$error</p>";} ?>
            <input type="text" name="first_name" placeholder="First name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email_address" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn" name="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>