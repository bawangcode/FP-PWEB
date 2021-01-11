<?php
session_start();

if( !isset($_SESSION["adminlogin"]) ){
  header("Location: admin_adminlogin.php");
  exit;
}

require '_functions.php';
$isitabel = query("SELECT * FROM users ORDER BY id DESC");
$isitabel2 = query("SELECT * FROM matapelajaran ORDER BY id DESC");
$isitabel3 = query("SELECT * FROM tugas ORDER BY submitID DESC");

if( isset($_POST["filterout"]) ){
  $isitabel = search($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS dari Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin - Home</title>
  </head>
  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="admin_topsecret.php">
          <img src="assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Bawagn
        </a>
          <div class="navbar-nav">
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create
              </a>
              <div class="dropdown-menu" aria-labelledby="navDropdown">
                <a class="dropdown-item" href="admin_createusers.php">Users</a>
                <a class="dropdown-item" href="admin_createmapel.php">Mapel</a>
              </div>
            </div>
            <a class="nav-link" href="_logout.php">Logout</a>
          </div>
      </div>
    </nav>

    <!--Filter-->
    <div class="container">
      <form action="" method="post">
        <div class="form-group">
          <label for="filter1">Filter by name</label>
          <input type="text" class="form-control" name="keyword" id="filter1" autocomplete="off">
        </div>
        <button type="submit" name="filterout" class="btn btn-primary">Filter</button>
      </form>
    </div>

    <!--Isi Database Tabel Users-->
    <div class="container">
      <h1>Isi Tabel User</h1>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Action</th>
            <th scope="col">Id</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($isitabel as $row) : ?>
          <tr>
            <td><a href="_update.php?id=<?= $row["id"]; ?>">Edit</a> | <a href="admin_deleteusers.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus data?');">Delete</a></td>
            <td><?= $row["id"]; ?></td>
            <td><?= $row["fullname"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["username"]; ?></td>
            <td><?= $row["password"]; ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>
    </div>


    <!--Isi Database Tabel Matapelajaran-->
    <div class="container">
      <h1>Isi Tabel Mata Pelajaran</h1>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Action</th>
            <th scope="col">Id</th>
            <th scope="col">Nama Mata Pelajaran</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($isitabel2 as $row) : ?>
          <tr>
            <td><a href="admin_deletemapel.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus data?');">Delete</a></td>
            <td><?= $row["id"]; ?></td>
            <td><?= $row["mapel"]; ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>

      </table>
    </div>


    <!--Isi Database Tabel Tugas-->
    <div class="container">
      <h1>Isi Tabel Tugas</h1>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">submitID</th>
            <th scope="col">userID</th>
            <th scope="col">mapelID</th>
            <th scope="col">namatugas</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($isitabel3 as $row) : ?>
          <tr>
            <td><?= $row["submitID"]; ?></td>
            <td><?= $row["userID"]; ?></td>
            <td><?= $row["mapelID"]; ?></td>
            <td><?= $row["namatugas"]; ?></td>
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
