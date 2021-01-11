<?php
session_start();

if( !isset($_SESSION["login"]) ){
  header("Location: siswa_login.php");
  exit;
}

require '_functions.php';
$isitabel = query("SELECT * FROM matapelajaran ORDER BY mapel ASC");

if ( isset($_POST["upload"]) ){
  //Ambil id dari mapel
  $tmp = $_POST["mapel"];
  $tmp = query("SELECT id FROM matapelajaran WHERE mapel = '$tmp'");
  $tmp = $tmp[0]["id"];
  //feedback
  if( uploadtugas($_POST) > 0 ){
    echo "
          <script>
          alert('Tugas berhasil dikumpulkan!');
          document.location.href = 'siswa_upload.php';
          </script>
        ";
  } else{
    echo "
          <script>
          alert('Terjadi kegagalan');
          document.location.href = 'siswa_upload.php';
          </script>
        ";
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
    <title>Kumpul Tugas</title>
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

    <!--jumbo-->
    <div class="jumbotron jumbotron-fluid text-center" style="">
      <div class="container">
              <h1>Form Pengumpulan Tugas</h1>
      </div>
    </div>

    <!--form Pengumpulan tugas-->
    <div class="container">
      <form action="//nowhere" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="pilihmapel">Pilih Mata Pelajaran</label>
          <select name="mapel" class="form-control" id="pilihmapel">
          <?php foreach ($isitabel as $opsi) : ?>
            <option><?= $opsi["mapel"]; ?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="judultugas">Judul Tugas</label>
          <input type="text" class="form-control" name="judultugas" id="judultugas" required>
          <label for="tugas">Tugas</label>
          <input type="file" class="form-control" name="tugas" id="tugas" required>
        </div>
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
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
        botbattler('siswa_upload.php')
      })
    </script>
  </body>

</html>
