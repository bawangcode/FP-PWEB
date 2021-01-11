<?php
session_start();

if( isset($_SESSION["adminlogin"]) ){
  header("Location: admin_topsecret.php");
  exit;
}
require '_functions.php';
if ( isset($_POST["adminlogin"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];
  $cekusername = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'" );

  if( mysqli_num_rows($cekusername) == 1 ){

    $row = mysqli_fetch_assoc($cekusername);
    if( password_verify($password, $row["password"]) ){
      //SESSION
      $_SESSION["adminlogin"] = true;
      header("Location: admin_topsecret.php");
      exit;
    }

  }
  $error = true;
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS dari Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login Bawagn</title>
  </head>

  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Bawagn
        </a>
          <div class="navbar-nav">
            <a class="nav-link" href="index.php">Home</a>
          </div>
      </div>
    </nav>


    <!--form Login-->
    <div class="container">
      <form action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username anda" id="username" required>
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password anda" id="password" required>
          <?php if( isset($error) ) : ?>
            <p style="color: red">Username atau Password tidak sesuai!</p>
          <?php endif; ?>
        </div>
        <button type="submit" name="adminlogin" class="btn btn-primary">Login</button>
      </form>
    </div>

    <!--Jquery + Popper.js + Bootstrap JS-->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
