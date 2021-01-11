<?php
session_start();

if( !isset($_SESSION["adminlogin"]) ){
  header("Location: admin_adminlogin.php");
  exit;
}

require '_functions.php';

$id = $_GET["id"];

if( deleteusers($id) > 0 ){
  echo "
        <script>
        alert('Data berhasil dihapus');
        document.location.href = 'admin_topsecret.php';
        </script>
      ";
}
?>
