<?php
include '../koneksi/koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');
//print_r($_SESSION);
$DB_HOST = "127.0.0.1";
$DB_USER = "root";
$DB_PASS = "";
$DB_DATABASE = "lims";
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}


function formatTanggal()
{
    date_default_timezone_set('Asia/Jakarta');

    $tgl = date("d"); // date("Y-m-d")
    $bulan = date("m");
    $tahun = date("Y");

    $templateNamaBulan = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    $bulan = $templateNamaBulan[((int)$bulan) - 1];

    return $tgl . "-" . $bulan . "-" . $tahun;
}

function tampilTombolTambahData()
{
    if (strtolower((string)$_SESSION['role']) == "siteman") {
        echo '<a href="tambah_data_pkg.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
    }
}

if (isset($_POST['data_edit'])) {
    $data_edit = $_POST['data_edit'];
    $dE_buffer = explode('#', $data_edit);
}


$data_edit = $_POST['data_edit'];
$dE_buffer = explode('#', $data_edit);

function formShow()
{

    if (isset($_POST['data_edit'])) {
        $data_edit = $_POST['data_edit'];
        $dE_buffer = explode('#', $data_edit);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> LIMS </title>
    <!-- datepicker -->
    <link href="../theme/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"/>

    <link href="../theme/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <!-- jvectormap -->
    <link href="../theme/dist/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet"/>

    <!-- Bootstrap Css -->
    <link href="../theme/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="../theme/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="../theme/dist/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

    <!-- DataTables -->
    <link href="../theme/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="../theme/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="../lims/theme/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>

    <link href="../lims/theme/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"/>

    <link href="../lims/theme/dist/assets/libs/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"
          type="text/css"/>

    <link href="../lims/theme/dist/assets/css/timepicker.css" rel="stylesheet" type="text/css"/>

    <script src="../theme/dist/assets/libs/jquery/jquery.min.js"></script>

    <style>
        .check_form {
            margin: 5px;
        }

        .check_form tr {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .check_form td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }

        .datepicker {
            z-index: 999999999999999 !important;
        }

        .timepicker {
            z-index: 999999999999999 !important;
        }

        $
        (
        '.timepicker'
        )
        .
        timepicker

        (
        {
            zindex: 9999999
        }
        )
        ;
        .bootstrap-timepicker-widget.dropdown-menu {
            z-index: 99999 !important;
        }

        .ui-timepicker-container {
            z-index: 3500 !important;
        }

        $
        (
        '.timepicker'
        )
        .
        timepicker

        (
        {
            showInputs: false
        }
        )
        }
        )
        ;

    </style>
</head>

<body data-topbar="colored">


<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'header.php'; ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php include "sidebar.php"; ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title mb-1">Analyst</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                        <?php
                                        $jd = '';
                                        // ==== KONEKSI DATABASE

                                        $sqlSelect_utama = "SELECT * FROM `tbl_utama_pkg` WHERE `id_utama` = '$dE_buffer[3]'";
                                        $hasilSelect_utama = $koneksi->query($sqlSelect_utama);
                                        $row_utama = $hasilSelect_utama->fetch_assoc(); ?>

                                        <tr>
                                            <td style="width: 150px">Nama Product</td>
                                            <td style="width: 20px">:</td>
                                            <td><?php echo($dE_buffer[1]) ?></td>
                                        </tr>
                                        <?php
                                        if (isset($_GET['type'])){
                                            if (!$_GET['type'] == "add") { ?>

                                            <tr>
                                                <td style="width: 150px">Item Check</td>
                                                <td style="width: 20px">:</td>
                                                <td><?php echo $row_utama["item_check"]; ?></td>
                                            </tr>

                                            <?php }
                                        }?>
                                        <tr>
                                            <td>Item Code</td>
                                            <td>:</td>
                                            <td><?php echo($dE_buffer[2]) ?></td>
                                        </tr>

                                        <tr>
                                            <td>Tanggal Item Masuk</td>
                                            <td>:</td>
                                            <td><?= $dE_buffer[4]; ?></td>
                                        </tr>
                                        <?php
                                        if (isset($_GET['type']) && !($_GET['type'] == "add")) { ?>
                                            <tr>
                                                <td>Jam Masuk</td>
                                                <td>:</td>
                                                <td><?= $row_utama["receive_time"] ?></td>
                                            </tr>
                                        <?php } ?>

                                        <tr>
                                            <td>Jumlah Product</td>
                                            <td>:</td>
                                            <td><?= $dE_buffer[5] ?></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="../dashboard/throw_data.php" method="POST">
                                        <?php if (isset($_GET['type'])){
                                        if ($_GET['type'] == "material") {
                                        $jd = "pm"; ?>
                                        <h2>Edit Data</h2>
                                        <hr>
                                        <div class="form-group mb-4">
                                            <label for="approval">Approval</label><br/>
                                            <table style="font-size: medium">
                                                <tr>
                                                    <td style="padding:10px;"><input type="radio" id="approval"
                                                                                     name="approval" value="1" checked/>Approve
                                                    </td>
                                                    <td style="padding:10px;"><input id="approval" type="radio"
                                                                                     name="approval" value="0"/>Decline
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="NPT">NPT</label><br/>
                                            <table style="font-size: medium">
                                                <tr>
                                                    <td style="padding:10px;"><input type="radio" id="NPT" name="NPT"
                                                                                     value="Valid" checked/>Valid
                                                    </td>
                                                    <td style="padding:10px;"><input id="NPT" type="radio" name="NPT"
                                                                                     value="Expired"/>Expired
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="finnish_time">Finnish Time</label>
                                            <input type="text" class="form-control" id="finnish_time"
                                                   name="finnish_time" value="<?php echo date("H:i"); ?>"
                                                   placeholder="Jam:Menit">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="received_name">Received Name</label>
                                            <input type="text" class="form-control" id="received_name"
                                                   name="received_name" value="<?php echo $_SESSION['nama_akun']; ?>"
                                                   placeholder="Received Name">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="cekSampel">Cek Sampel</label>
                                            <input type="text" class="form-control" id="cekSampel" name="cekSampel"
                                                   placeholder="Cek Sampel">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="tglEdit">Tanggal Pengecekan</label>
                                            <input type="text" class="form-control" id="tanggal" name="tgl_cek"
                                                   value="<?php echo formatTanggal(); ?>"
                                                   placeholder="Tanggal-Bulan-Tahun">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Pengecekan</h2>
                                    <hr>
                                    <table class="check_form" id="pengecekan">
                                        <tr>
                                            <td>No</td>
                                            <td style="width: 400px">Item Pengecekan</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">1</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">2</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">3</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">4</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">5</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">6</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">7</td>
                                            <td rowspan="2" style="width: 80px; text-align: center">8</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Kondisi Luar</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Warna Botol</td>
                                            <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,1" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,2" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,3" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,4" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,5" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,6" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,7" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input
                                                        type="radio" name="1,8" value="NG"/>NG
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Kondisi Screw *</td>
                                            <td><input type="radio" name="2,1" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,1" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,2" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,2" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,3" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,3" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,4" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,4" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,5" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,5" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,6" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,6" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,7" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,7" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="2,8" value="OK" checked/>OK<br/><input
                                                        type="radio" name="2,8" value="NG"/>NG
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Tempat lubang</td>
                                            <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,1" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,2" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,3" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,4" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,5" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,6" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,7" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="3,8" value="Tidak"/>Tidak
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Label Depan</td>
                                            <td><input type="radio" name="4,1" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,1" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,2" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,2" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,3" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,3" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,4" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,4" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,5" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,5" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,6" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,6" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,7" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,7" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="4,8" value="OK" checked/>OK<br/><input
                                                        type="radio" name="4,8" value="NG"/>NG
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Label Belakang</td>
                                            <td><input type="radio" name="5,1" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,1" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,2" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,2" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,3" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,3" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,4" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,4" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,5" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,5" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,6" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,6" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,7" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,7" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="5,8" value="OK" checked/>OK<br/><input
                                                        type="radio" name="5,8" value="NG"/>NG
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Cacat</td>
                                            <td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,1" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,2" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,3" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,4" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,5" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,6" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,7" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="6,8" value="Tidak"/>Tidak
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Posisi Label Depan dan Belakang</td>
                                            <td><input type="radio" name="7,1" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,1" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,2" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,2" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,3" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,3" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,4" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,4" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,5" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,5" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,6" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,6" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,7" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,7" value="NG"/>NG
                                            </td>
                                            <td><input type="radio" name="7,8" value="OK" checked/>OK<br/><input
                                                        type="radio" name="7,8" value="NG"/>NG
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10">Kondisi Dalam</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Kotoran</td>
                                            <td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,1" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,2" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,3" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,4" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,5" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,6" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,7" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="8,8" value="Tidak"/>Tidak
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Benda Asing</td>
                                            <td><input type="radio" name="9,1" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,1" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,2" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,2" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,3" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,3" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,4" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,4" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,5" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,5" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,6" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,6" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,7" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,7" value="Tidak"/>Tidak
                                            </td>
                                            <td><input type="radio" name="9,8" value="Ada" checked/>Ada<br/><input
                                                        type="radio" name="9,8" value="Tidak"/>Tidak
                                            </td>
                                        </tr>
                                    </table>
                                    * Pengecekan dilakukan apabila diperlukan
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    elseif ($_GET['type'] == "add") {
                    $jd = "add"; ?>

                    <style>
                        #topLabel {
                            display: none;
                        }
                    </style>

                    <h2>Edit Data</h2>
                    <hr>
                    <div class="form-group mb-4">
                        <label for="approval">Approval</label><br/>
                        <table style="font-size: medium">
                            <tr>
                                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1"
                                                                 checked/>Approve
                                </td>
                                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group mb-4">
                        <label for="item_check">Item Check</label><br/>
                        <table style="font-size: medium">
                            <tr>
                                <td style="padding:10px;"><input type="radio" id="item_check" name="item_check"
                                                                 value="baseOil" checked/>Base Oil
                                </td>
                                <td style="padding:10px;"><input id="item_check" type="radio" name="item_check"
                                                                 value="additive"/>Additive
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="form-group mb-4">
                        <label for="tglEdit">Tanggal Pengecekan</label>
                        <input type="text" class="form-control" id="tanggal" name="tgl_cek"
                               value="<?php echo formatTanggal(); ?>" placeholder="Tanggal-Bulan-Tahun">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>Pengecekan</h2>
                    <hr>
                    <table class="check_form" id="pengecekan">
                        <tr>
                            <td>No</td>
                            <td style="width: 430px">Item Pengecekan</td>
                            <td rowspan="2" style="width: 80px; text-align: center">Result</td>
                        </tr>
                        <tr>
                            <td colspan="2">Visual</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Nama Produk sesuai dengan dokumen</td>
                            <td style="text-align: center"><input type="radio" name="1,1" value="OK"
                                                                  checked/>OK<br/><input type="radio" name="1,1"
                                                                                         value="NG"/>NG
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Berat Produk sesuai dengan packing list</td>
                            <td style="text-align: center"><input type="radio" name="2,1" value="OK"
                                                                  checked/>OK<br/><input type="radio" name="2,1"
                                                                                         value="NG"/>NG
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Seal terpasang dengan baik</td>
                            <td style="text-align: center"><input type="radio" name="3,1" value="OK"
                                                                  checked/>OK<br/><input type="radio" name="3,1"
                                                                                         value="NG"/>NG
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Bocor /lubang</td>
                            <td style="text-align: center"><input type="radio" name="4,1" value="Ada"
                                                                  checked/>Ada<br/><input type="radio" name="4,1"
                                                                                          value="Tidak"/>Tidak
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Kotoran / Benda asing</td>
                            <td style="text-align: center"><input type="radio" name="5,1" value="Ada"
                                                                  checked/>Ada<br/><input type="radio" name="5,1"
                                                                                          value="Tidak"/>Tidak
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Penyok</td>
                            <td style="text-align: center"><input type="radio" name="6,1" value="Ada"
                                                                  checked/>Ada<br/><input type="radio" name="6,1"
                                                                                          value="Tidak"/>Tidak
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Karat</td>
                            <td style="text-align: center"><input type="radio" name="7,1" value="Ada"
                                                                  checked/>Ada<br/><input type="radio" name="7,1"
                                                                                          value="Tidak"/>Tidak
                            </td>
                        </tr>
                    </table>
                    * Pengecekan dilakukan apabila diperlukan
                </div>
            </div>
        </div>
    </div>
<?php }
elseif ($_GET['type'] == "ibc") {
$jd = "ibc"; ?>
    <h2>Edit Data</h2>
    <hr>
    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve
                </td>
                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="NPT">NPT</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td>
                <td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="finnish_time">Finnish Time</label>
        <input type="text" class="form-control" id="finnish_time" name="finnish_time" value="<?php echo date("H:i"); ?>"
               placeholder="Jam:Menit">
    </div>
    <div class="form-group mb-4">
        <label for="received_name">Received Name</label>
        <input type="text" class="form-control" id="received_name" name="received_name"
               value="<?php echo $_SESSION['nama_akun']; ?>" placeholder="Received Name">
    </div>
    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tglEdit">Tanggal Pengecekan</label>
        <input type="text" class="form-control" id="tanggal" name="tgl_cek" value="<?php echo formatTanggal(); ?>"
               placeholder="Tanggal-Bulan-Tahun">
    </div>
</div>
</div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h2>Pengecekan</h2>
            <hr>
            <table class="check_form" id="pengecekan">
                <tr>
                    <td>No</td>
                    <td style="width: 400px">Item Pengecekan</td>
                    <td rowspan="2" style="width: 80px; text-align: center">1</td>
                    <td rowspan="2" style="width: 80px; text-align: center">2</td>
                    <td rowspan="2" style="width: 80px; text-align: center">3</td>
                    <td rowspan="2" style="width: 80px; text-align: center">4</td>
                    <td rowspan="2" style="width: 80px; text-align: center">5</td>
                    <td rowspan="2" style="width: 80px; text-align: center">6</td>
                    <td rowspan="2" style="width: 80px; text-align: center">7</td>
                    <td rowspan="2" style="width: 80px; text-align: center">8</td>
                </tr>
                <tr>
                    <td colspan="2">Kondisi Luar</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Kondisi Valve Nozzle</td>
                    <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7"
                                                                                         value="NG"/>NG
                    </td>
                    <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8"
                                                                                         value="NG"/>NG
                    </td>
                    <
                </tr>
                <tr>
                    <td>2</td>
                    <td>Terdapat lubang/kebocoran</td>
                    <td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8"
                                                                                           value="Tidak"/>Tidak
                    </td>
                </tr>
                <tr>
                    <td colspan="10">Kondisi Dalam</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Kotoran</td>
                    <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8"
                                                                                           value="Tidak"/>Tidak
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Air / Oli</td>
                    <td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7"
                                                                                           value="Tidak"/>Tidak
                    </td>
                    <td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8"
                                                                                           value="Tidak"/>Tidak
                    </td>
                </tr>
            </table>
            * Pengecekan dilakukan apabila diperlukan
        </div>
    </div>
</div>
</div>
<?php }
elseif ($_GET['type'] == "pail") {
    $jd = "p"; ?>
    <h2>Edit Data</h2>
    <hr>
    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve
                </td>
                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="NPT">NPT</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td>
                <td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="finnish_time">Finnish Time</label>
        <input type="text" class="form-control" id="finnish_time" name="finnish_time" value="<?php echo date("H:i"); ?>"
               placeholder="Jam:Menit">
    </div>
    <div class="form-group mb-4">
        <label for="received_name">Received Name</label>
        <input type="text" class="form-control" id="received_name" name="received_name"
               value="<?php echo $_SESSION['nama_akun']; ?>" placeholder="Received Name">
    </div>
    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tglEdit">Tanggal Pengecekan</label>
        <input type="text" class="form-control" id="tanggal" name="tgl_cek" value="<?php echo formatTanggal(); ?>"
               placeholder="Tanggal-Bulan-Tahun">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2>Pengecekan</h2>
                <hr>
                <table class="check_form" id="pengecekan">
                    <tr>
                        <td>No</td>
                        <td style="width: 400px">Item Pengecekan</td>
                        <td rowspan="2" style="width: 80px; text-align: center">1</td>
                        <td rowspan="2" style="width: 80px; text-align: center">2</td>
                        <td rowspan="2" style="width: 80px; text-align: center">3</td>
                        <td rowspan="2" style="width: 80px; text-align: center">4</td>
                        <td rowspan="2" style="width: 80px; text-align: center">5</td>
                        <td rowspan="2" style="width: 80px; text-align: center">6</td>
                        <td rowspan="2" style="width: 80px; text-align: center">7</td>
                        <td rowspan="2" style="width: 80px; text-align: center">8</td>
                    </tr>
                    <tr>
                        <td colspan="2">Kondisi Luar</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Warna Pail</td>
                        <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Terdapat lubang/kebocoran</td>
                        <td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Terdapat lekukan pada bodi</td>
                        <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Kondisi Seal</td>
                        <td><input type="radio" name="4,1" value="OK" checked/>OK<br/><input type="radio" name="4,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,2" value="OK" checked/>OK<br/><input type="radio" name="4,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,3" value="OK" checked/>OK<br/><input type="radio" name="4,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,4" value="OK" checked/>OK<br/><input type="radio" name="4,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,5" value="OK" checked/>OK<br/><input type="radio" name="4,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,6" value="OK" checked/>OK<br/><input type="radio" name="4,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,7" value="OK" checked/>OK<br/><input type="radio" name="4,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,8" value="OK" checked/>OK<br/><input type="radio" name="4,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td colspan="10">Kondisi Dalam</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Kotoran</td>
                        <td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Karat</td>
                        <td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Benda Asing</td>
                        <td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bau yang tidak biasa</td>
                        <td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                </table>
                * Pengecekan dilakukan apabila diperlukan
            </div>
        </div>
    </div>
    </div>
<?php } elseif ($_GET['type'] == "cap") {
    $jd = "pc"; ?>
    <h2>Edit Data</h2>
    <hr>
    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve
                </td>
                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="NPT">NPT</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td>
                <td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="finnish_time">Finnish Time</label>
        <input type="text" class="form-control" id="finnish_time" name="finnish_time" value="<?php echo date("H:i"); ?>"
               placeholder="Jam:Menit">
    </div>
    <div class="form-group mb-4">
        <label for="received_name">Received Name</label>
        <input type="text" class="form-control" id="received_name" name="received_name"
               value="<?php echo $_SESSION['nama_akun']; ?>" placeholder="Received Name">
    </div>
    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tglEdit">Tanggal Pengecekan</label>
        <input type="text" class="form-control" id="tanggal" name="tgl_cek" value="<?php echo formatTanggal(); ?>"
               placeholder="Tanggal-Bulan-Tahun">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2>Pengecekan</h2>
                <hr>
                <table class="check_form" id="pengecekan">
                    <tr>
                        <td>No</td>
                        <td style="width: 400px; height: 40px">Item Pengecekan</td>
                        <td style="width: 80px; text-align: center">1</td>
                        <td style="width: 80px; text-align: center">2</td>
                        <td style="width: 80px; text-align: center">3</td>
                        <td style="width: 80px; text-align: center">4</td>
                        <td style="width: 80px; text-align: center">5</td>
                        <td style="width: 80px; text-align: center">6</td>
                        <td style="width: 80px; text-align: center">7</td>
                        <td style="width: 80px; text-align: center">8</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Warna Cap</td>
                        <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kotoran</td>
                        <td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Goresan pada cap</td>
                        <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Cacat pada cap</td>
                        <td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Lubang</td>
                        <td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Kondisi Seal</td>
                        <td><input type="radio" name="6,1" value="OK" checked/>OK<br/><input type="radio" name="6,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,2" value="OK" checked/>OK<br/><input type="radio" name="6,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,3" value="OK" checked/>OK<br/><input type="radio" name="6,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,4" value="OK" checked/>OK<br/><input type="radio" name="6,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,5" value="OK" checked/>OK<br/><input type="radio" name="6,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,6" value="OK" checked/>OK<br/><input type="radio" name="6,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,7" value="OK" checked/>OK<br/><input type="radio" name="6,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,8" value="OK" checked/>OK<br/><input type="radio" name="6,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Terdapat Bari atau Mata ikan</td>
                        <td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                </table>
                * Pengecekan dilakukan apabila diperlukan
            </div>
        </div>
    </div>
    </div>

<?php } elseif ($_GET['type'] == "cartonbox") {
    $jd = "pcb"; ?>
    <h2>Edit Data</h2>
    <hr>
    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve
                </td>
                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="NPT">NPT</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td>
                <td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="finnish_time">Finnish Time</label>
        <input type="text" class="form-control" id="finnish_time" name="finnish_time" value="<?php echo date("H:i"); ?>"
               placeholder="Jam:Menit">
    </div>
    <div class="form-group mb-4">
        <label for="received_name">Received Name</label>
        <input type="text" class="form-control" id="received_name" name="received_name"
               value="<?php echo $_SESSION['nama_akun']; ?>" placeholder="Received Name">
    </div>
    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tglEdit">Tanggal Pengecekan</label>
        <input type="text" class="form-control" id="tanggal" name="tgl_cek" value="<?php echo formatTanggal(); ?>"
               placeholder="Tanggal-Bulan-Tahun">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2>Pengecekan</h2>
                <hr>
                <table class="check_form" id="pengecekan">
                    <tr>
                        <td>No</td>
                        <td style="width: 400px; height: 40px">Item Pengecekan</td>
                        <td style="width: 80px; text-align: center">1</td>
                        <td style="width: 80px; text-align: center">2</td>
                        <td style="width: 80px; text-align: center">3</td>
                        <td style="width: 80px; text-align: center">4</td>
                        <td style="width: 80px; text-align: center">5</td>
                        <td style="width: 80px; text-align: center">6</td>
                        <td style="width: 80px; text-align: center">7</td>
                        <td style="width: 80px; text-align: center">8</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Warna Cap</td>
                        <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kotoran</td>
                        <td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Goresan pada cap</td>
                        <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Cacat pada cap</td>
                        <td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Lubang</td>
                        <td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Kondisi Seal</td>
                        <td><input type="radio" name="6,1" value="OK" checked/>OK<br/><input type="radio" name="6,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,2" value="OK" checked/>OK<br/><input type="radio" name="6,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,3" value="OK" checked/>OK<br/><input type="radio" name="6,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,4" value="OK" checked/>OK<br/><input type="radio" name="6,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,5" value="OK" checked/>OK<br/><input type="radio" name="6,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,6" value="OK" checked/>OK<br/><input type="radio" name="6,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,7" value="OK" checked/>OK<br/><input type="radio" name="6,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="6,8" value="OK" checked/>OK<br/><input type="radio" name="6,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Terdapat Bari atau Mata ikan</td>
                        <td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                </table>
                * Pengecekan dilakukan apabila diperlukan
            </div>
        </div>
    </div>
    </div>

<?php } elseif ($_GET['type'] == "cartonbox") {
    $jd = "pcb"; ?>
    <h2>Edit Data</h2>
    <hr>
    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve
                </td>
                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="NPT">NPT</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td>
                <td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="finnish_time">Finnish Time</label>
        <input type="text" class="form-control" id="finnish_time" name="finnish_time" value="<?php echo date("H:i"); ?>"
               placeholder="Jam:Menit">
    </div>
    <div class="form-group mb-4">
        <label for="received_name">Received Name</label>
        <input type="text" class="form-control" id="received_name" name="received_name"
               value="<?php echo $_SESSION['nama_akun']; ?>" placeholder="Received Name">
    </div>
    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tglEdit">Tanggal Pengecekan</label>
        <input type="text" class="form-control" id="tanggal" name="tgl_cek" value="<?php echo formatTanggal(); ?>"
               placeholder="Tanggal-Bulan-Tahun">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2>Pengecekan</h2>
                <hr>
                <table class="check_form" id="pengecekan">
                    <tr>
                        <td>No</td>
                        <td style="width: 400px">Item Pengecekan</td>
                        <td rowspan="2" style="width: 80px; text-align: center">1</td>
                        <td rowspan="2" style="width: 80px; text-align: center">2</td>
                        <td rowspan="2" style="width: 80px; text-align: center">3</td>
                        <td rowspan="2" style="width: 80px; text-align: center">4</td>
                        <td rowspan="2" style="width: 80px; text-align: center">5</td>
                        <td rowspan="2" style="width: 80px; text-align: center">6</td>
                        <td rowspan="2" style="width: 80px; text-align: center">7</td>
                        <td rowspan="2" style="width: 80px; text-align: center">8</td>
                    </tr>
                    <tr>
                        <td colspan="2">Kondisi Luar</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Kondisi Carton</td>
                        <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Warna Carton</td>
                        <td><input type="radio" name="2,1" value="OK" checked/>OK<br/><input type="radio" name="2,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,2" value="OK" checked/>OK<br/><input type="radio" name="2,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,3" value="OK" checked/>OK<br/><input type="radio" name="2,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,4" value="OK" checked/>OK<br/><input type="radio" name="2,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,5" value="OK" checked/>OK<br/><input type="radio" name="2,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,6" value="OK" checked/>OK<br/><input type="radio" name="2,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,7" value="OK" checked/>OK<br/><input type="radio" name="2,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="2,8" value="OK" checked/>OK<br/><input type="radio" name="2,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kotoran</td>
                        <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Gambar</td>
                        <td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Label</td>
                        <td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">Kondisi Dalam</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Kotoran</td>
                        <td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                </table>
                * Pengecekan dilakukan apabila diperlukan
            </div>
        </div>
    </div>
    </div>
<?php } elseif ($_GET['type'] == "drum") {
    $jd = "pd"; ?>
    <h2>Edit Data</h2>
    <hr>
    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve
                </td>
                <td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="NPT">NPT</label><br/>
        <table style="font-size: medium">
            <tr>
                <td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td>
                <td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td>
            </tr>
        </table>
    </div>
    <div class="form-group mb-4">
        <label for="finnish_time">Finnish Time</label>
        <input type="text" class="form-control" id="finnish_time" name="finnish_time" value="<?php echo date("H:i"); ?>"
               placeholder="Jam:Menit">
    </div>
    <div class="form-group mb-4">
        <label for="received_name">Received Name</label>
        <input type="text" class="form-control" id="received_name" name="received_name"
               value="<?php echo $_SESSION['nama_akun']; ?>" placeholder="Received Name">
    </div>
    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tglEdit">Tanggal Pengecekan</label>
        <input type="text" class="form-control" id="tanggal" name="tgl_cek" value="<?php echo formatTanggal(); ?>"
               placeholder="Tanggal-Bulan-Tahun">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2>Pengecekan</h2>
                <hr>
                <table class="check_form" id="pengecekan">
                    <tr>
                        <td>No</td>
                        <td style="width: 400px">Item Pengecekan</td>
                        <td rowspan="2" style="width: 80px; text-align: center">1</td>
                        <td rowspan="2" style="width: 80px; text-align: center">2</td>
                        <td rowspan="2" style="width: 80px; text-align: center">3</td>
                        <td rowspan="2" style="width: 80px; text-align: center">4</td>
                        <td rowspan="2" style="width: 80px; text-align: center">5</td>
                        <td rowspan="2" style="width: 80px; text-align: center">6</td>
                        <td rowspan="2" style="width: 80px; text-align: center">7</td>
                        <td rowspan="2" style="width: 80px; text-align: center">8</td>
                    </tr>
                    <tr>
                        <td colspan="2">Kondisi Luar</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Warna Drum</td>
                        <td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Terdapat lubang/kebocoran</td>
                        <td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="2,8" value="Ada" checked/>Adaa<br/><input type="radio" name="2,8"
                                                                                                value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Terdapat lekukan pada bodi</td>
                        <td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Kondisi Seal</td>
                        <td><input type="radio" name="4,1" value="OK" checked/>OK<br/><input type="radio" name="4,1"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,2" value="OK" checked/>OK<br/><input type="radio" name="4,2"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,3" value="OK" checked/>OK<br/><input type="radio" name="4,3"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,4" value="OK" checked/>OK<br/><input type="radio" name="4,4"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,5" value="OK" checked/>OK<br/><input type="radio" name="4,5"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,6" value="OK" checked/>OK<br/><input type="radio" name="4,6"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,7" value="OK" checked/>OK<br/><input type="radio" name="4,7"
                                                                                             value="NG"/>NG
                        </td>
                        <td><input type="radio" name="4,8" value="OK" checked/>OK<br/><input type="radio" name="4,8"
                                                                                             value="NG"/>NG
                        </td>
                        <
                    </tr>
                    <tr>
                        <td colspan="10">Kondisi Dalam</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Kotoran</td>
                        <td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Karat</td>
                        <td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Benda Asing</td>
                        <td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Bau yang tidak biasa</td>
                        <td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7"
                                                                                               value="Tidak"/>Tidak
                        </td>
                        <td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8"
                                                                                               value="Tidak"/>Tidak
                        </td>
                    </tr>
                </table>
                * Pengecekan dilakukan apabila diperlukan
            </div>
        </div>
    </div>
    </div>
<?php }
     else {
        echo '<br><h4>Data edit tidak tersedia karena type barang tidak sesuai aturan!</h4>';
        echo '
                <style>
                    #tombolSR {
                    display: none;
                    }
                    #topLabel {
                    display: none;
                    }
                </style>
                ';
    }
}

else {
    echo 'none';
    echo '<style>    
                                    #tombolSR {    
                                        display: none;    
                                        }    
                                   #topLabel {    
                                        display: none;    
                                        }</style>';

} ?>


<div class="form-group mb-4" id="tombolSR">
    <input type="hidden" name="jenisData" value="<?php echo($jd . '#' . $dE_buffer[3]) ?>"
           class="btn btn-primary mt-4 "/>
    <!--                                        <input type="reset" class="btn btn-outline-danger mt-4" onClick="location.reload();">Reset</input>-->
</div>
<div class="form-group mb-4" id="tombolSR">
    <input type="submit" class="btn btn-primary mt-4 " value="Submit"></input>
    <button type="reset" class="btn btn-outline-danger mt-4" onClick="location.reload();">Reset</button>
</div>
</form>
</div>
</div>
<!-- end container-fluid -->
</div>
</div>

<!-- End Page-content -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                2020 © LIMS.
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->


<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
<script src="../theme/dist/assets/libs/jquery/jquery.min.js"></script>


<script src="../theme/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../theme/dist/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="../theme/dist/assets/libs/simplebar/simplebar.min.js"></script>
<script src="../theme/dist/assets/libs/node-waves/waves.min.js"></script>

<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

<!-- datepicker -->
<script src="../theme/dist/assets/libs/air-datepicker/js/datepicker.min.js"></script>
<script src="../theme/dist/assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

<!-- Required datatable js -->
<script src="../theme/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../theme/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../theme/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../theme/dist/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../theme/dist/assets/libs/jszip/jszip.min.js"></script>
<script src="../theme/dist/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="../theme/dist/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="../theme/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../theme/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../theme/dist/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="../theme/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../theme/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="../theme/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Datatable init js -->
<script src="../theme/dist/assets/js/pages/datatables.init.js"></script>
<script src="../theme/dist/assets/js/pages/timepicker.js"></script>

<script src="../theme/dist/assets/libs/bootstrap-select/js/bootstrap-select.js"></script>
<script>
    $(document).ready(function () {
        $(".datepicker-here").datepicker({
            dateFormat: "yyyy-mm-dd",
            zIndexOffset: 1040

        });
        $(".datepicker-here").css('z-index', '99999 !important');
        $('.timepicker').timepicker({
            showInputs: false
        })
        $('.datatable1').DataTable();
    });

</script>
<script type="text/javascript">
</script>


</body>
</html>