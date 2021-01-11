<?php
session_start();

if( isset($_SESSION["tendiklogin"]) ){
  header("Location: tendik_dashboard.php");
  exit;
}

require '_functions.php';
if ( isset($_POST["login"]) ){

  $username = $_POST["username"];
  $password = $_POST["password"];
  $cekusername = mysqli_query($conn, "SELECT * FROM tendik WHERE username = '$username'" );

  if( mysqli_num_rows($cekusername) == 1 ){

    $row = mysqli_fetch_assoc($cekusername);
    if( password_verify($password, $row["password"]) ){
      //SESSION
      $_SESSION["tendiklogin"] = true;
      header("Location: tendik_dashboard.php");
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
    <link rel="stylesheet" href="css/footer.css">
    <title>Login Bawagn</title>
  </head>

  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="color: white;">
          <img src="assets/logoputih.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Bawagn
        </a>
          <div class="navbar-nav">
            <a class="nav-link" href="index.php" style="color: #f5b56c;">Home</a>
          </div>
      </div>
    </nav>

    <!--jumbo-->
    <div class="jumbotron jumbotron-fluid text-center" style="">
      <div class="container">
                <h1>Login</h1>
      </div>
    </div>

    <!--form Login-->
    <div class="container">
      <form action="//nowhere" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username anda" id="username" required>
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan Password anda" id="password" required>
          <a href="tendik_register.php">Belum punya akun?</a>
          <?php if( isset($error) ) : ?>
            <p style="color: red">Username atau Password tidak sesuai!</p>
          <?php endif; ?>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </form>
    </div>
    <noscript><p><em>
      Javascript is disabled on this page. You must enable Javascript to submit the form.
    </em></p></noscript>

    <!--Jquery + Popper.js + Bootstrap JS-->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/botbattler.min.js"></script>
    <script>
      document.addEventListener('readystatechange', _ => {
        if (document.readyState == 'complete')
        botbattler('tendik_login.php')
      })
    </script>
  </body>

</html>
