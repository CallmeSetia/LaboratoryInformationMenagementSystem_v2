<?php
include  'koneksi/koneksi.php';


// ==


// INSERT INTO `tbl_user`(`id_user`, `nama_akun`, `username`, `password`, `role`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
$FLAG_INSERT = 0;
if (isset($_POST['submit'])) {
    // == kon
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

    if ($koneksi->connect_errno) {
        echo "Connection Error: " . $koneksi->connect_error;
    }
    // Tambah data
//    print_r($_POST);

    $usename = $_POST['Username'];
    $password = $_POST['Password'];
    $role = (int) $_POST['role'];
    if ($role == 1) {
        $role = "siteman";
    }
    else {
        $role = "analyst";
    }
    $nama_akun = $_POST['nama_akun'];

    $sql_insert = "INSERT INTO `tbl_user`(`id_user`, `nama_akun`, `username`, `password`, `role`) VALUES ('NULL','$nama_akun','$usename','$password','$role')";
    $hasil = $koneksi->query($sql_insert);

    if ($hasil) {
        $FLAG_INSERT = 1;

    }
    else {
        $FLAG_INSERT = -1;
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
    <link href="theme/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"/>

    <link href="theme/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
    <!-- jvectormap -->
    <link href="theme/dist/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet"/>

    <!-- Bootstrap Css -->
    <link href="theme/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="theme/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="theme/dist/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

    <!-- DataTables -->
    <link href="theme/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="theme/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="lims/theme/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
          rel="stylesheet" type="text/css"/>

    <link href="lims/theme/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css"/>

    <link href="lims/theme/dist/assets/libs/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"
          type="text/css"/>

    <link href="lims/theme/dist/assets/css/timepicker.css" rel="stylesheet" type="text/css"/>

    <style>
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

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="theme/dist/assets/images/logo-sm-dark.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="theme/dist/assets/images/logo-dark.png" alt="" height="20">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="theme/dist/assets/images/logo-sm-light.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="theme/dist/assets/images/logo-light.png" alt="" height="20">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="mdi mdi-backburger"></i>
                </button>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="index.php" class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"></div>
                            <span>Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">

            <!-- Page-Title -->


            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="page-title mb-1 text-left"> Sistem User Menagement</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <button class="btn btn-success btn-rounded " data-toggle="modal"
                                    data-target="#modal-add-tambah" href="javascript:void(0)"><i
                                        class="mdi mdi-plus-thick"></i></button>
                        </div>
                        <div class="col-md-12 mt-5">
                            <?php
                             if($FLAG_INSERT == 1) { ?>
                                 <div class="alert alert-success" role="alert">
                                     Berhasil Tambah Data
                                 </div>
                             <?php }
                             else if ($FLAG_INSERT == 0) { ?>
                                 <div class="alert alert-danger" role="alert">
                                     Gagal Tambah Data
                                 </div>
                            <?php }
                             else {
                                 //pass
                             }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable"
                                           class="table table-bordered dt-responsive nowrap table-striped"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            $hasilQuery = $koneksi->query("SELECT * FROM `tbl_user`");
                                            if ($num_rows = $hasilQuery->num_rows > 0) {
                                                while ($row = $hasilQuery->fetch_assoc()) {
                                                   echo "
                                                   <tr>
                                                    <td>".$i."</td>
                                                    <td>".$row['nama_akun']."</td>
                                                    <td>".$row['username']."</td>
                                                    <td>".$row['password']."</td>
                                                    <td>".$row['role']."</td>
                                                   </tr>";
//                                                    print_r($row);
                                                }
                                            }
                                            ?>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end page-content-wrapper -->
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
    <div id="modal-add-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-tambah"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Tambah Data : Additive</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <fieldset>


                            <div class="form-group mb-4">
                                <label for="nama_akun">Nama Akun.</label>
                                <input type="text" class="form-control" id="nama_akun" name="nama_akun" placeholder="Nama Akun">
                            </div>
                            <div class="form-group mb-4">
                                <label for="Username">Username.</label>
                                <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
                            </div>
                            <div class="form-group mb-4">
                                <label for="Password">Password</label>
                                <input type="text" class="form-control" id="Password" name="Password" placeholder="Password">
                            </div>

                            <div class="form-group mb-4">
                                <label for="role">Role</label><br>
                                <select class="selectpicker"  id="role" name="role" data-live-search="true">
                                    <option value="" selected disabled hidden>Role</option>
                                    <option value="1">Siteman</option>
                                    <option value="0">Analyst</option>
                                </select>
                            </div>

                            <input type="hidden" name="submit" value="submit" />
                            <div class="form-group mb-4">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="theme/dist/assets/libs/jquery/jquery.min.js"></script>


    <script src="theme/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="theme/dist/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="theme/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="theme/dist/assets/libs/node-waves/waves.min.js"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <!-- datepicker -->
    <script src="theme/dist/assets/libs/air-datepicker/js/datepicker.min.js"></script>
    <script src="theme/dist/assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

    <!-- Required datatable js -->
    <script src="theme/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="theme/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="theme/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="theme/dist/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="theme/dist/assets/libs/jszip/jszip.min.js"></script>
    <script src="theme/dist/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="theme/dist/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="theme/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="theme/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="theme/dist/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="theme/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="theme/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="theme/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Datatable init js -->
    <script src="theme/dist/assets/js/pages/datatables.init.js"></script>
    <script src="theme/dist/assets/js/pages/timepicker.js"></script>

    <script src="theme/dist/assets/libs/bootstrap-select/js/bootstrap-select.js"></script>
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
