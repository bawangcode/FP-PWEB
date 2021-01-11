<?php
session_start();

if( !isset($_SESSION["tendiklogin"]) ){
  header("Location: tendik_login.php");
  exit;
}

require '_functions.php';
$isitabel3 = query("SELECT submitID, users.fullname, matapelajaran.mapel, judultugas, namatugas FROM tugas JOIN users ON users.id = tugas.userID JOIN matapelajaran ON matapelajaran.id = tugas.mapelID ORDER BY submitID DESC");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS dari Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Tendik - Tugas</title>
  </head>
  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container">
        <a class="navbar-brand" href="tendik_dashboard.php" style="color: white;">
          <img src="assets/logoputih.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Bawagn
        </a>
          <div class="navbar-nav">
            <a class="nav-link" href="tendik_dashboard.php" style="color: #f5b56c;">Home</a>
            <a class="nav-link" href="_logout.php" style="color: #f5b56c;">Logout</a>
          </div>
      </div>
    </nav>

    <!--jumbo-->
    <div class="jumbotron jumbotron-fluid text-center" style="">
      <div class="container">
        <h1>Tugas Terkumpul</h1>
      </div>
    </div>

    <!--Isi Database Tabel Tugas-->
    <div class="container">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama Pengumpul</th>
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Judul Penugasan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($isitabel3 as $row) : ?>
          <tr>
            <td><?= $row["fullname"]; ?></td>
            <td><?= $row["mapel"]; ?></td>
            <td><?= $row["judultugas"]; ?></td>
            <td><a href="tendik_downloadfile.php?submitID=<?= $row["submitID"];  ?>">Download</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>
    </div>

    <!--Jquery + Popper.js + Bootstrap JS-->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
