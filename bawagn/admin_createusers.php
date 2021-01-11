<?php
session_start();

if( !isset($_SESSION["adminlogin"]) ){
  header("Location: admin_adminlogin.php");
  exit;
}

require '_functions.php';

if ( isset($_POST["submit"]) ){
  //feedback
  if( createusers($_POST) > 0 ){
    echo "
          <script>
          alert('Data berhasil ditambahkan');
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
    <title>Admin - Create</title>
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
            <a class="nav-link" href="admin_topsecret.php">Read</a>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Create
              </a>
              <div class="dropdown-menu" aria-labelledby="navDropdown">
                <a class="dropdown-item" href="admin_createusers.php">Users</a>
                <a class="dropdown-item" href="admin_createmapel.php">Mapel</a>
              </div>
            </div>
          </div>
      </div>
    </nav>

    <!--form Create Data Users-->
    <div class="container">
      <h1>Create Data for Users</h1>

      <form action="" method="post">
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" name="fullname" id="fullname" required>
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" required>
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" required>
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
      </form>
    </div>


    <!--Jquery + Popper.js + Bootstrap JS-->
    <script src="js/slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
