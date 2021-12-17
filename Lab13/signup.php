<?php
require_once "config.php";
if(isset($_POST["submit"])){
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if(empty($first_name) || empty($last_name) || empty($email) || empty($password)){
        $error = "All fields are required";
    }else{
        $check_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($check_sql) > 0){
            $error = "Email already has been taken";
        }else{
            $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = mysqli_query($conn, "INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES (NULL, '$first_name', '$last_name', '$email', '$hashed_pwd');");
            if($insert_sql){
                header("Location: login.php?msg=Successfully registered! Please login.");
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>IT 2600</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">IT 2600</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
          </ul>
          <form class="d-flex">
            <a href="signup.php" class="btn btn-outline-primary btn-sm me-2">Sign up</a>
            <a href="login.php" class="btn btn-primary btn-sm">Login</a>
          </form>
        </div>
      </div>
    </nav>

    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4 mx-auto text-center">
          <h2 class="mb-4">Signup</h2>
          <div class="card p-2 bg-light border p-5">
              <?php
              if(isset($error)){
                  echo "<p class='text-danger'>$error</p>";
              }
              ?>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="first_name" placeholder="First Name" required>
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="last_name" placeholder="Last Name" required>
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email_address" placeholder="Email Address" required>
                    <label for="floatingInput">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" name="password" placeholder="Password" required>
                    <label for="floatingInput">Password</label>
                </div>
                <button class="btn btn-primary w-100" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>