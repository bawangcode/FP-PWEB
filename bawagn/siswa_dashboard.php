<?php
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location: siswa_login.php");
  exit;
}

require '_functions.php'

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS dari Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Bawagn, FP milik Zulfikar</title>
  </head>
  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container">
        <a class="navbar-brand" href="siswa_dashboard.php" style="color: white;">
          <img src="assets/logoputih.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Bawagn
        </a>
          <div class="navbar-nav">
            <a class="nav-link" href="_logout.php" style="color: #f5b56c;">Logout</a>
          </div>
      </div>
    </nav>

    <!--Halaman Utama-->
    <div class="jumbotron" style="height: 100vh; margin-bottom: 0;">
      <div class="container">
        <h1 class="display-4">Portal Siswa</h1>
        <p class="lead">Tugas menugas menjadi mudah bersama Bawagn!</p>
        <hr class="my-4">
        <p>Anda masuk sebagai siswa! berikut opsi yang tersedia untuk anda.</p>
        <a class="btn btn-warning btn-lg" href="siswa_upload.php" role="button">Upload Tugas</a>
      </div>
    </div>


    <!--Footer-->
    <footer id="footer" class="footer-1">
      <div class="main-footer widgets-dark typo-light">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="widget subscribe no-box">
                <h5 class="widget-title">Tentang kami<span></span></h5>
                <p>Bawagn adalah sebuah final project dari mata kuliah pemrograman web, bawagn berfungsi sebagai platform pengumpulan tugas</p>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="widget no-box">
                <h5 class="widget-title">Mulai sekarang<span></span></h5>
                <p>Dapatkan akses ke platform pengumpulan tugas sekarang juga!</p>
                <a class="btn" href="_register.php" target="_blank">Daftar sekarang!</a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
              <div class="widget no-box">
                <h5 class="widget-title">Contact Us<span></span></h5>
                <ul class="social-footer2">
                  <p style="color: #f5b56c;">email: info@bawagn.com</p>
                </ul>
                <ul class="social-footer2">
                  <p style="color: #f5b56c;">address: Kampus ITS Sukolilo, Surabaya</p>
                </ul>
                <ul class="social-footer2">
                  <li class=""><a title="Channel Youtube" target="_blank" href="https://www.youtube.com/channel/UCDpD463vQF-WE4HYMF7rHjw"><img alt="youtube" width="30" height="30" src="assets/logoputih.png"></a></li>
                  <li class=""><a title="Univku" target="_blank" href="https://www.its.ac.id"><img alt="Univ" width="30" height="30" src="assets/logoputih.png"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p>Copyright Bawagn © 2020. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!--Jquery + Popper.js + Bootstrap JS-->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
