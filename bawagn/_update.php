<?php
session_start();

if( !isset($_SESSION["adminlogin"]) ){
  header("Location: admin_adminlogin.php");
  exit;
}

require '_functions.php';

$id = $_GET["id"];
$userdata = query("SELECT * FROM users WHERE id = $id")[0];

if ( isset($_POST["submit"]) ){
  //feedback
  if( update($_POST) > 0 ){
    echo "
          <script>
          alert('Data berhasil diubah');
          document.location.href = 'admin_topsecret.php';
          </script>
        ";
  } else{
    echo "
          <script>
          alert('Terjadi kegagalan');
          document.location.href = 'admin_topsecret.php';
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
    <title>Admin - Update</title>
  </head>

  <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
          Bawagn
        </a>
          <div class="navbar-nav">
            <a class="nav-link" href="admin_topsecret.php">Read</a>
          </div>
      </div>
    </nav>

    <!--form Create Data-->
    <div class="container">
      <h1>Update User Data</h1>

      <form action="" method="post">
        <div class="form-group">

          <input type="hidden" name="id" value="<?= $userdata["id"]; ?>">

          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" name="fullname" id="fullname" required value="<?= $userdata["fullname"]; ?>">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" required value="<?= $userdata["email"]; ?>">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" required value="<?= $userdata["username"]; ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
      </form>
    </div>

    <!--Jquery + Popper.js + Bootstrap JS-->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
