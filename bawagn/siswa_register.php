<?php
require '_functions.php';

if( isset($_POST["register"]) ){
  if( registrasi($_POST) > 0 ){
    echo "<script>
          alert('user baru berhasil terdaftar!')
          </script>";
  }else{
    echo mysqli_error($conn);
  }
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
    <title>Register Bawagn</title>
  </head>

  <body>

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
        <h1>Daftar Akun Baru</h1>
      </div>
    </div>

    <!--form Register-->
    <div class="container">
      <form action="//nowhere" method="post">
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" name="fullname" id="fullname" required>
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" required>
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>
          <label for="confirmpassword">Konfirmasi Password</label>
          <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
          <a href="siswa_login.php">Sudah punya akun?</a>
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
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
        botbattler('siswa_register.php')
      })
    </script>
  </body>

</html>
