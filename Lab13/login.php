<?php
require_once "config.php";
if(isset($_POST["submit"])){
    $email = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if(empty($email) || empty($password)){
        $error = "All fields are required";
    }else{
        $check_sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' OR user_id = '$email'");
        if(mysqli_num_rows($check_sql) > 0){
            $row = mysqli_fetch_array($check_sql);
            
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["name"] = $row["first_name"]." ".$row["last_name"];
            header("Location: index.php");

        }else{
            $error = "Email already or User ID does not exists";
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
              <a class="nav-link"  href="index.html">Home</a>
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
          <h2 class="mb-4">Login</h2>
          <div class="card p-2 bg-light border p-5">
              <?php
              if(isset($error)){
                  echo "<p class='text-danger'>$error</p>";
              }
              ?>
              <?php
              if(isset($_GET["msg"])){
                  echo "<p class='text-success'>".$_GET["msg"]."</p>";
              }
              ?>
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="email_address" placeholder="Email Address/User ID" required>
                    <label for="floatingInput">Email Address/User ID</label>
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