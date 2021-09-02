<?php
require_once  'koneksi/koneksi.php';
// Start Session
session_start();

$_SESSION['userName']   = "";
$_SESSION['passName']   = "";
$_SESSION['role']       = "";


include "./koneksi/config.php";
print_r($_GET);
$database = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
$userLogin = $_GET['usernameLogin'];
$passLogin = $_GET['passwordLogin'];
$roleUser = "";

// echo $pinLogin;/////////////////////

if ($database->connect_errno) {
    echo "koneksi error";
}
else {
    echo "<br> Koneksi Aman";
    // pass
}
$flagLogin = 0;
$sql = "SELECT * FROM `tbl_user` WHERE `password` = '$passLogin' AND `username` = '$userLogin'";
$hasil = $database->query($sql);

if ($hasil->num_rows > 0) {
    // output data of each row
   if($row = $hasil->fetch_assoc()) {
      echo "id: " . $row["id_user"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
      $idUser = $row["id_user"];
      $roleUser = $row['role'];
      $passUser = $row['password'];
      $userUser = $row['username'];

      echo "<br> LOGIN ";
      $flagLogin = 1;
    }

}
else {
    echo "0 results";
    echo "<br> PIN SALAH ";
    $flagLogin = 0;
}

$_SESSION['userName']   = "$userUser";
$_SESSION['passName']   = "$passUser";
$_SESSION['role']       = "$roleUser";

if ($flagLogin === 1) {
    echo $userUser;
    $t_sql = "UPDATE `tbl_user` SET `last_login`=CURRENT_TIMESTAMP WHERE `user` = '$userUser' AND `id_user` = '$idUser'  ";
    $t_result = $database->query($t_sql); 

    $database->close();

    echo "OKE0";
    header("location: index.php?sukses=1&user=$userUser&role=$roleUser");
}
else {
    $database->close();
    echo "NO";
    header("location: index.php?sukses=0&user=$userUser");
}


?>