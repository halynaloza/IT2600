<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "it1150";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["submit"])){
    $email = $_POST["email_address"];
    $password = $_POST["password"];

    $login_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($login_sql) > 0){
        $login_row = mysqli_fetch_array($login_sql);
        if(password_verify($password, $login_row["password"])){
            $_SESSION["user_id"] = $login_row["user_id"];
            $_SESSION["user_name"] = $login_row["first_name"] . " " . $login_row["last_name"];
            header("Location: index.php");
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
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
        Login
    </h2>
    <div class="card">
        <form action="" method="post">
            <input type="email" name="email_address" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn" name="submit">Login</button>
        </form>
    </div>
</body>
</html>