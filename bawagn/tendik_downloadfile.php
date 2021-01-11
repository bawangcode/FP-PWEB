<?php
session_start();

if( !isset($_SESSION["tendiklogin"]) ){
  header("Location: tendik_login.php");
  exit;
}

require '_functions.php';

$id = $_GET["submitID"];
download($id);

/*if( download($id) > 0 ){
  echo "
        <script>
        alert('Data berhasil diunduh');
        document.location.href = 'tendik_readtugas.php';
        </script>
      ";
}*/
?>
