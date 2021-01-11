<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "fppweb");

//fungsi query data
function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows;
}

//fungsi download
function download($id){
  global $conn;
  $name = query("SELECT namatugas FROM tugas WHERE submitID = $id");
  $name = 'tugas/' . $name[0]["namatugas"];
  $tipeFile = explode('.', $name);
  $tipeFile = strtolower(end($tipeFile));
  $namadownload = query("SELECT judultugas FROM tugas WHERE submitID = $id");
  $namadownload = $namadownload[0]["judultugas"];
  header('Content-Description: File Transfer');
  header('Content-Type: application/force-download');
  header("Content-Disposition: attachment; filename=\"" . basename($namadownload) . '.' . $tipeFile . "\";");
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  ob_clean();
  flush();
  readfile($name);
  exit;
}

//fungsi upload
function cektugas(){
  $namaTugasLengkap = $_FILES['tugas']['name'];
  $ukuranFile = $_FILES['tugas']['size'];
  $error = $_FILES['tugas']['error'];
  $tmpName = $_FILES['tugas']['tmp_name'];

  $allowedType = ['docx', 'jpg', 'jpeg', 'png', 'pdf', 'pptx', 'rar', 'zip'];
  //cek availability
  if( $error === 4){
    echo "<script>
          alert('Pilih tugas terlebih dahulu!');
          </script>";
          return false;
  }
  //cek tipe file
  $tipeTugas = explode('.', $namaTugasLengkap);
  $tipeTugas = strtolower(end($tipeTugas));
  if( !in_array($tipeTugas, $allowedType) ){
    echo "<script>
          alert('Tipe file tidak diperbolehkan!');
          </script>";
          return false;
  }
  //cek ukuran
  if( $ukuranFile > 100000000 ){
    echo "<script>
          alert('FIle terlalu besar!');
          </script>";
          return false;
  }
  //generate unique filename
  $uniqueFileName = uniqid();
  $uniqueFileName .= '.';
  $uniqueFileName .= $tipeTugas;

  //upload
  move_uploaded_file($tmpName, 'tugas/' . $uniqueFileName);

  return $uniqueFileName;
}
function uploadtugas($data){
  global $conn;
  global $tmp;
  $userID = $_SESSION["authuserid"];
  $mapelID = (int)$tmp;
  $judultugas = htmlspecialchars($data["judultugas"]);
  $namatugas = cektugas();
  if( !$namatugas ){
    return false;
  }
  $query = "INSERT INTO tugas VALUES('', '$userID', '$mapelID', '$judultugas', '$namatugas')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

//fungsi create data
function createusers($data){
  global $conn;
  $fullname = htmlspecialchars($data["fullname"]);
  $email = htmlspecialchars($data["email"]);
  $username = htmlspecialchars($data["username"]);
  $password = htmlspecialchars($data["password"]);
  $password = password_hash($password, PASSWORD_DEFAULT);
  //query create
  $query = "INSERT INTO users VALUES('','$fullname', '$email', '$username', '$password')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function createmapel($data){
  global $conn;
  $mapel = htmlspecialchars($data["mapel"]);
  //query create
  $query = "INSERT INTO matapelajaran VALUES('', '$mapel')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function createtugas($data){
  global $conn;
  $userID = htmlspecialchars($data["userID"]);
  $mapelID = htmlspecialchars($data["mapelID"]);
  $namatugas = htmlspecialchars($data["namatugas"]);
  //query create
  $query = "INSERT INTO tugas VALUES('', $userID, $mapelID, '$namatugas')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


//fungsi delete
function deleteusers($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM users WHERE id= $id");
  return mysqli_affected_rows($conn);
}

function deletemapel($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM matapelajaran WHERE id= $id");
  return mysqli_affected_rows($conn);
}

//fungsi update
function update($data){
  global $conn;

  $id = $data["id"];
  $fullname = htmlspecialchars($data["fullname"]);
  $email = htmlspecialchars($data["email"]);
  $username = htmlspecialchars($data["username"]);
  //query update
  $query = "UPDATE users SET fullname = '$fullname', username = '$username', email = '$email' WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

//fungsi search
function search($keyword){
  $query = "SELECT * FROM users WHERE fullname LIKE '%$keyword%'";

  return query($query);
}


//fungsi registrasi
function registrasi($data){
  global $conn;
  $fullname = htmlspecialchars($data["fullname"]);
  $email = htmlspecialchars($data["email"]);
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);
  //konfirm username dupe
  $cekuser = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
  if( mysqli_fetch_assoc($cekuser) ){
    echo "<script>
          alert('username tidak tersedia, coba username lainnya')
          </script>";
          return false;
  }
  //konfirm Password
  if( $password !== $confirmpassword){
    echo "<script>
          alert('Password dan Konfirmasi Password tidak sesuai!');
          </script>";
          return false;
  }
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  //masuk ke database
  mysqli_query($conn, "INSERT INTO users VALUES('', '$fullname', '$email', '$username', '$password')");
  return mysqli_affected_rows($conn);
}

function registrasiadmin($data){
  global $conn;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);
  //konfirm username dupe
  $cekuser = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
  if( mysqli_fetch_assoc($cekuser) ){
    echo "<script>
          alert('username tidak tersedia, coba username lainnya')
          </script>";
          return false;
  }
  //konfirm Password
  if( $password !== $confirmpassword){
    echo "<script>
          alert('Password dan Konfirmasi Password tidak sesuai!');
          </script>";
          return false;
  }
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  //masuk ke database
  mysqli_query($conn, "INSERT INTO admin VALUES('$username', '$password')");
  return mysqli_affected_rows($conn);
}

//fungsi registrasitendik
function registrasitendik($data){
  global $conn;
  $fullname = htmlspecialchars($data["fullname"]);
  $email = htmlspecialchars($data["email"]);
  $institusi = htmlspecialchars($data["institusi"]);
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $confirmpassword = mysqli_real_escape_string($conn, $data["confirmpassword"]);
  //konfirm username dupe
  $cekuser = mysqli_query($conn, "SELECT username FROM tendik WHERE username = '$username'");
  if( mysqli_fetch_assoc($cekuser) ){
    echo "<script>
          alert('username tidak tersedia, coba username lainnya')
          </script>";
          return false;
  }
  //konfirm Password
  if( $password !== $confirmpassword){
    echo "<script>
          alert('Password dan Konfirmasi Password tidak sesuai!');
          </script>";
          return false;
  }
  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);
  //masuk ke database
  mysqli_query($conn, "INSERT INTO tendik VALUES('', '$fullname', '$email', '$institusi', '$username', '$password')");
  return mysqli_affected_rows($conn);
}
 ?>
