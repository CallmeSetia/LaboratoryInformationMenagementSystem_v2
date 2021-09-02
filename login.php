<?php
require_once  'koneksi/koneksi.php';
session_start();

// Cek Session Apakah Sudah Login?
    // Redirect ke index.php, lalu dari index ke /dashboard
if (isset($_SESSION['username']) && !isset($_POST['submitLogin'])) {
    // echo $_SESSION['userName']; // DEBUGG
    if ($_SESSION['username'] != "" || $_SESSION['username'] !=NULL ) {
        header("Location: index.php");
    }
}
// ===================================

/* CONTROLLER LOGIN */
$FLAG_LOGIN = 0; // 0 - Belum Ada Aksi, 1 - Login berhasil, -1 - Login Gagal

// ALGORITMA
// Cek Apakah sudah submit ? - Method POST
    // (IF TRUE)
        // Verifikasi USER BENAR ATAU TIDAK
        // (IF BENAR)
            // AMBIL DATA BERKAITAN DENGAN USER ex: userName, Role
            // MASUKAN KE SESSION
            // RETURN FLAG_LOGIN =  1 - Login berhasil
        // (ELSE SALAH)
            // CLEAR SESSION
            // RETURN FLAG_LOGIN =  -1 - Login Gagal

    // (ELSE FALSE)
        // RETURN FLAG_LOGIN =  0 - Belum Ada Aksi

if (isset($_POST['submitLogin'])) { // Cek Apakah sudah submit ? - Method POST
    // AMBIL DATA USER INPUT
    $username = $_POST['usernameLogin'];
    $password = $_POST['passwordLogin'];

    // ==== KONEKSI DATABASE
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

    if ($koneksi->connect_errno) {
        echo "Connection Error: " . $koneksi->connect_error;
    }
    // ====== END KONEKSI

    $sqlCekUser = sprintf("SELECT * FROM `tbl_user` WHERE `username` = '%s' AND `password` = '%s'", $username, $password); // Verifikasi USER BENAR ATAU TIDAK
    $hasil = $koneksi -> query($sqlCekUser);

    echo "R";
    if ((int)$hasil->num_rows > 0) {      // JIKA BENAR -- ADA DATA/USER VALID
        $username = "";
        $password = "";
        $role = "";
        $id_user = "";
        $nama_akun = "";

        if($row = $hasil->fetch_assoc()) { // AMBIL DATA BERKAITAN DENGAN USER ex: userName, Role
            //echo "id: " . $row["id_user"]. " - Name: " . $row["username"]. " password " . $row["password"]. "<br>"; // DEBUGG
            $id_user = $row["id_user"];
            $nama_akun = $row["nama_akun"];
            $username = $row["username"];
            $password = $row["password"];
            $role = $row["role"];
        }

        // MASUKAN KE SESSION
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nama_akun'] = $nama_akun;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = strtolower($role);

        $FLAG_LOGIN = 1; // BERHASIL

        header("Location: index.php");
    }
    else { // JIKA BENAR --  TIDAK ADA DATA/USER TIDAK VALID
        //  echo "USER ATAU PASSOWORD SALAH"; // DEBUGG

        // RESET SESSION
        $_SESSION['id_user']    = NULL;
        $_SESSION['nama_akun']  = NULL;
        $_SESSION['username']   = NULL;
        $_SESSION['password']   = NULL;
        $_SESSION['role']       = NULL;

        $FLAG_LOGIN = -1; // USER PASS SALAH
    }
}
else { // Tidak Submit
    $FLAG_LOGIN = 0; // TIDAK ADA AKSI
}
//    echo $FLAG_LOGIN;

//printHallo();
// ========================================
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LIMS - Laboratory Information Management System</title>
    <link href="theme/dist/assets/css-js-mid/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="theme/dist/assets/css-js-mid/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="theme/dist/assets/css-js-mid/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="theme/dist/assets/css-js-mid/css/colors/default.css" id="theme"  rel="stylesheet">
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="" width="50"></a>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign In to Receiving</h3>
            <small>Laboratory Information Management System</small>
            <form class="form-horizontal new-lg-form" id="loginform" action="" method="POST">
                <input type="hidden" name="submitLogin" value="submitLogin">
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>Username</label>
                        <input class="form-control" type="text" name="usernameLogin" required="" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Password</label>
                        <input class="form-control" type="password" name="passwordLogin" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-6">
                        <a href="" class="btn btn-info btn-lg btn-block btn-rounded text-uppercase">Back</a>
                    </div>
                    <div class="col-xs-6">
                        <input type="submit" class="btn btn-danger btn-lg btn-block btn-rounded text-uppercase" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>
<!-- jQuery -->
<script src="theme/dist/assets/css-js-mid/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="theme/dist/assets/css-js-mid/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="theme/dist/assets/css-js-mid/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="theme/dist/assets/css-js-mid/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="theme/dist/assets/css-js-mid/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="theme/dist/assets/css-js-mid/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="theme/dist/assets/css-js-mid/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>