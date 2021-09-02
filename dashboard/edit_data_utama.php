<?php
include '../koneksi/koneksi.php';
session_start();
//print_r($_SESSION);

$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}


if (isset( $_POST['data_edit'])) {
    $data_edit = $_POST['data_edit'];
    $dE_buffer = explode('#', $data_edit);

}
function formShow(){
   if (isset( $_POST['data_edit'])) {
       $data_edit = $_POST['data_edit'];
       $dE_buffer = explode('#', $data_edit);
   }
    // ANALYST
    if (isset($_POST['data_edit'])) {
        if (strtolower((string) $dE_buffer[0]) == "drum") {
            echo file_get_contents('../dashboard/edit_form/ps_pd.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "pail") {
            echo file_get_contents('../dashboard/edit_form/ps_p.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "cap") {
            echo file_get_contents('../dashboard/edit_form/ps_pc.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "cartonbox") {
            echo file_get_contents('../dashboard/edit_form/ps_pcb.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "material") {
            echo file_get_contents('../dashboard/edit_form/p_pm.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "ibc") {
            echo file_get_contents('../dashboard/edit_form/ps_ibc.php');
        } else {
            echo ('Type item dalam database tidak valid');
        }
    }



    // SITEMAN
    else if (isset($_POST['id_utama'])){
        if ($_POST['id_utama'] != NULL && $_POST['id_utama'] > -1 && $_POST['id_utama'] != ""){
            echo include('../dashboard/edit_form/data_utama_edit.php');
        }
        else {
            echo "1";
        }
    }
    else {
        echo "0";
    }

    /*

    if(isset($_POST['value'])) {
        echo file_get_contents('../dashboard/edit_form/ps_pd.php');
    } else {
        echo file_get_contents('../dashboard/edit_form/ps_pcb.php');
    }
    */

}


$id_utama = (int)  $_POST['id_utama'];
$mode = strtolower((string) $_POST['mode']);

$sql_select = "";
$hasilQuery = "";
$row = "";
if (isset($_POST['mode'])) {
    if ( $mode== "packaging") {
        $sql_select = "SELECT * FROM `tbl_utama_pkg` LEFT JOIN tbl_data_item_pkg ON tbl_data_item_pkg.id_item_pkg = tbl_utama_pkg.id_item_pkg WHERE id_utama = $id_utama";

        $hasilQuery = $koneksi->query($sql_select);
        $row = $hasilQuery->fetch_assoc();
    }
    else {
        $sql_select = "SELECT * FROM `tbl_utama_add` LEFT JOIN tbl_data_item_add ON tbl_data_item_add.id_item_add = tbl_utama_add.id_item_add WHERE id_utama = $id_utama";

        $hasilQuery = $koneksi->query($sql_select);
        $row = $hasilQuery->fetch_assoc();

    }
}



$FLAG_UPDATE = 0;

//updated packaging

if (isset($_POST['updated-packaging'])) {
    // AMBIL DATA USER INPUT
    //    print_r($_POST);
    $idUtama = $_POST['idUtama'];

    $docNumber = $_POST['docNumber'];
    $issuedDate = $_POST['issuedDate'];
    $receiveTime = $_POST['receiveTime'];

//    $itemCode = $_POST['itemCode'];
    $itemType = $_POST['itemType'];
    $itemId = $_POST['itemId'];
    $productName = $_POST['productName'];

    $Quantity = $_POST['Quantity'];
    $PackagingCondition = $_POST['PackagingCondition'];

    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $Submitted = $_POST['Submitted'];
    $Received = $_POST['Received'];

    $sql_update = "UPDATE `tbl_utama_pkg` SET `id_utama`='$idUtama',`doc_no`='$docNumber',`date`='$issuedDate',`receive_time`='$receiveTime',
                           `id_item_pkg`='$itemId',`item_check`='$itemType',`quantity`='$Quantity',`packaging_condition`='$PackagingCondition',`status`='$status',
                           `remark`='$remark',`submitted`='$Submitted',`received`='$Received' WHERE `id_utama` = $idUtama";

    $hasilUpdate = $koneksi -> query($sql_update);

    if ($hasilUpdate) {
        $FLAG_UPDATE = 1;
        header("Location: index.php?page=packaging");
    }
    else {
        $FLAG_UPDATE = -1;
    }

}
else if (isset($_POST['updated-additive'])) {
    echo "<pre>";
    print_r($_POST);

    $idUtama = $_POST['idUtama'];

    $docNumber = $_POST['docNumber'];
    $issuedDate = $_POST['issuedDate'];
    $receiveTime = $_POST['receiveTime'];
    $lotNumber = $_POST['lotNumber'];

    $itemId = $_POST['itemId'];
    $weight = $_POST['weight'];

    $Quantity = $_POST['Quantity'];

    $sql_update = "UPDATE `tbl_utama_add` SET `id_utama`='$idUtama',`doc_no`='$docNumber',`date`='$issuedDate',`lot_no`='$lotNumber',`id_item_add`='$itemId',`quantity`='$Quantity' WHERE `id_utama` = '$idUtama'";

    $hasilUpdate = $koneksi -> query($sql_update);

    if ($hasilUpdate) {
        $FLAG_UPDATE = 1;
        header("Location: index.php?page=additive");
    }
    else {
        $FLAG_UPDATE = -1;
    }

}
else if (isset($_POST['updated-additive'])) {
    echo "<pre>";
    print_r($_POST);

    $idUtama = $_POST['idUtama'];

    $docNumber = $_POST['docNumber'];
    $issuedDate = $_POST['issuedDate'];
    $receiveTime = $_POST['receiveTime'];
    $lotNumber = $_POST['lotNumber'];

    $itemId = $_POST['itemId'];
    $weight = $_POST['weight'];

    $Quantity = $_POST['Quantity'];

    $sql_update = "UPDATE `tbl_utama_add` SET `id_utama`='$idUtama',`doc_no`='$docNumber',`date`='$issuedDate',`lot_no`='$lotNumber',`id_item_add`='$itemId',`quantity`='$Quantity' WHERE `id_utama` = '$idUtama'";

    $hasilUpdate = $koneksi -> query($sql_update);

    if ($hasilUpdate) {
        $FLAG_UPDATE = 1;
        header("Location: index.php?page=additive");
    }
    else {
        $FLAG_UPDATE = -1;
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
        <link href="../theme/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />

        <link href="../theme/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../theme/dist/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="../theme/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../theme/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../theme/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="../theme/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../theme/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="../lims/theme/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="../lims/theme/dist/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />

        <link href="../lims/theme/dist/assets/libs/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" type="text/css" />

        <link href="../lims/theme/dist/assets/css/timepicker.css" rel="stylesheet" type="text/css" />

        <script src="../theme/dist/assets/libs/jquery/jquery.min.js"></script>

        <style>
            .datepicker{
                z-index: 999999999999999 !important;
            }

            .timepicker{
                z-index: 999999999999999 !important;
            }
            $('.timepicker').timepicker({ zindex: 9999999});
            .bootstrap-timepicker-widget.dropdown-menu {
                z-index: 99999!important;
            }
            .ui-timepicker-container {
                z-index: 3500 !important;
            }
            $('.timepicker').timepicker({
                showInputs: false
            })
            });

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
                                    <li class="breadcrumb-item active">Review Sample</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
<!--                            <div class="col-md-12">-->
<!--                                <div class="card">-->
<!--                                    <div class="card-body">-->
<!--                                      --><?php //if ($mode=="packaging") { ?>
<!---->
<!--                                        <table>-->
<!--                                            <tbody><tr>-->
<!--                                                <td style="width: 150px">Doc No</td>-->
<!--                                                <td style="width: 20px">:</td>-->
<!--                                                <td>--><?//=$row['doc_no']; ?><!--</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>Issued Date</td>-->
<!--                                                <td>:</td>-->
<!--                                                <td>--><?//=$row['date']; ?><!--</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>Receive Time</td>-->
<!--                                                <td>:</td>-->
<!--                                                <td>--><?//=$row['receive_time']; ?><!--</td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>Item Check</td>-->
<!--                                                <td>:</td>-->
<!--                                                <td>--><?//=$row['item_check']; ?><!--</td>-->
<!--                                            </tr>-->
<!--                                            -->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                         --><?php //}
//                                      else if ($mode == "additive") { ?>
<!--                                          <table>-->
<!--                                              <tbody><tr>-->
<!--                                                  <td style="width: 150px">Sample ID</td>-->
<!--                                                  <td style="width: 20px">:</td>-->
<!--                                                  <td>E4086</td>-->
<!--                                              </tr>-->
<!--                                              <tr>-->
<!--                                                  <td>Product Brand</td>-->
<!--                                                  <td>:</td>-->
<!--                                                  <td>ENEOS ENGINE OIL</td>-->
<!--                                              </tr>-->
<!--                                              <tr>-->
<!--                                                  <td>Product Grade</td>-->
<!--                                                  <td>:</td>-->
<!--                                                  <td>SN 5W-30</td>-->
<!--                                              </tr>-->
<!--                                              <tr>-->
<!--                                                  <td>Oil Type</td>-->
<!--                                                  <td>:</td>-->
<!--                                                  <td>ENGINE OIL</td>-->
<!--                                              </tr>-->
<!--                                              <tr>-->
<!--                                                  <td>Lot Number</td>-->
<!--                                                  <td>:</td>-->
<!--                                                  <td>DN1H54</td>-->
<!--                                              </tr>-->
<!--                                              </tbody>-->
<!--                                          </table>-->
<!---->
<!--                                      --><?php //}?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        if ($mode=="packaging") { ?>
                                            <form  action="" method="POST">

                                                <input type="hidden" name="idUtama" value="<?= $id_utama?>">

                                                <div class="form-group mb-4">
                                                    <label for="docNumber">Document No.</label>
                                                    <input type="text" class="form-control" id="docNumber" name="docNumber" value="<?=$row['doc_no']; ?>" placeholder="Doc No">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="issuedDate">Issued Date</label>
                                                    <input type="text" class="form-control" id="issuedDate" name="issuedDate"  value="<?=$row['date']; ?>" placeholder="Issued Date">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="issuedDate">Receive Time</label>
                                                    <input type="text" class="form-control" id="receiveTime" name="receiveTime" value="<?=$row['receive_time']; ?>" placeholder="Receive Time">
                                                </div>

                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-4">
                                                        <label for="itemCode">Item Code</label> <br>

                                                        <select class="selectpicker" id="itemCode" name="itemCode" data-live-search="true">
                                                            <option value="<?=$row['item_code']; ?>" selected disabled hidden><?=$row['item_code']; ?></option>
                                                            <?php
                                                            $sqlSelectItem = "SELECT * FROM `tbl_data_item_pkg`";
                                                            $hasilQuery = $koneksi->query($sqlSelectItem);

                                                            while($rows = $hasilQuery->fetch_array() ) {?>
                                                                <option value="<?php echo $rows[0]."+%".$rows[2]?>"><?php echo strtoupper($rows[1]); ?></option>
                                                            <?php }?>
                                                        </select>
                                                        <!--  <span id="prints">asdsd</span>-->
                                                        <input type="hidden" name="itemType" id="prints" value="<?=$row['item_check']; ?>" >
                                                        <input type="hidden" name="itemId" id="itemId" value="<?=$row['id_item_pkg']; ?>" >
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="productName">Product Name</label>
                                                        <input type="text" class="form-control" id="productName" value="<?=$row['packaging_name']; ?>" name="productName" placeholder="Product Name">
                                                    </div>

                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="Quantity">Quantity</label>
                                                    <input type="text" class="form-control" id="Quantity" value="<?=$row['quantity']; ?>" name="Quantity" placeholder="Quantity">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="PackagingCondition">Packaging Condition</label>
                                                    <input type="text" class="form-control" id="PackagingCondition" value="<?=$row['packaging_condition']; ?>" name="PackagingCondition" placeholder="Packaging Condition">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="status">Status</label>
                                                    <input type="text" class="form-control" id="status" name="status" value="<?=$row['status']; ?>"  placeholder="Status" required>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="remark">Remark</label>
                                                    <input type="text" class="form-control" id="remark"  name="remark" value="<?=$row['remark']; ?>"  placeholder="Remark">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="Submitted">Submitted Name</label>
                                                    <input type="text" class="form-control" id="Submitted" name="Submitted" value="<?=$row['submitted']; ?>" placeholder="Submitted Name">
                                                </div>

                                                <div class="form-group mb-4">
<!--                                                    <label for="Received">Received Name</label>-->
                                                    <input type="hidden" class="form-control" id="Received" name="Received" value="<?=$row['received']; ?>" placeholder="Received Name">
                                                </div>


                                                <input type="hidden" name="updated-packaging" value="update" />
                                                <div class="form-group mb-4">
                                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                                    <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                                                </div>

                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        //$('#productName').val("<?//=$row['packaging_name']; ?>//");
                                                        $("#itemCode").change(function () {
                                                            // $("#prints").text($(this).find('option:selected').text());
                                                            var buff = $("#productName").val($(this).val());
                                                            var splitText = $(this).val().split("+%"); // splitText[0] - id

                                                            $("#productName").val(splitText[1]);
                                                            $("#itemId").val(splitText[0]); // idItem
                                                            // console.log($(this).val().split("+%"));



                                                            var selectedItemCode = $(this).find('option:selected').text();
                                                            var arr =  selectedItemCode.split("-");
                                                            var typeItem = arr[0].split("P");

                                                            console.log(typeItem);
                                                            console.log(arr);

                                                            // PARSING ITME CODE to Product Type

                                                            if (typeItem[1] == 08 || typeItem[1] == "08" ) { // PAIL
                                                                $("#prints").val("PAIL");
                                                                console.log("PAIL");
                                                            }
                                                        else if (typeItem[1] == 01 || typeItem[1] == "01" ) { // BOTOL
                                                                if (arr[1] > 252 && arr[1] < 256) {
                                                                    $("#prints").val("TUBE");
                                                                    console.log("TUBE");
                                                                }
                                                                else {
                                                                    $("#prints").val("BOTOL");
                                                                    console.log("BOTOL");
                                                                }
                                                            }
                                                            else if (typeItem[1] == 04 || typeItem[1] == "04" ) { // DRUM
                                                                $("#prints").val("DRUM");
                                                                console.log("DRUM");
                                                            }

                                                            else if (typeItem[1] == 05 || typeItem[1] == "05" ) { // LABEL
                                                                $("#prints").val("LABEL");
                                                                console.log("LABEL");
                                                            }

                                                            else if (typeItem[1] == 03 || typeItem[1] == "03" ) { // CARTON
                                                                $("#prints").val("CARTON");
                                                                console.log("CARTON");
                                                            }

                                                            else if (typeItem[1] == 02 || typeItem[1] == "02" ) { // CAP
                                                                if (arr[1] == 26) {
                                                                    $("#prints").val("COVER CAP");
                                                                    console.log("COVER CAP");
                                                                }
                                                                else {
                                                                    $("#prints").val("CAP");
                                                                    console.log("CAP");
                                                                }

                                                            }
                                                            else { // DRUM
                                                                $("#prints").val("DRUM");
                                                                console.log("DRUM");
                                                            }

                                                        });
                                                    });
                                                </script>
                                            </form>
                                        <?php }
                                        else if ($mode == "additive") { ?>
                                            <form  action="" method="POST">

                                                <input type="hidden" name="idUtama" value="<?= $id_utama?>">

                                                <div class="form-group mb-4">
                                                    <label for="docNumber">Document No.</label>
                                                    <input type="text" class="form-control" id="docNumber" name="docNumber" value="<?=$row['doc_no']; ?>" placeholder="Doc No">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="issuedDate">Issued Date</label>
                                                    <input type="text" class="form-control" id="issuedDate" name="issuedDate"  value="<?=$row['date']; ?>" placeholder="Issued Date">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="issuedDate">Lot Number</label>
                                                    <input type="text" class="form-control" id="lotNumber" name="lotNumber" value="<?=$row['lot_no']; ?>" placeholder="Lot Number">
                                                </div>

                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-4">
                                                        <label for="additive">Additive</label> <br>

                                                        <select class="selectpicker" id="additive" name="additive" data-live-search="true">

                                                            <option value="<?=$row['additive']; ?>" selected disabled hidden><?=$row['additive']; ?></option>
                                                            <?php
                                                            $sqlSelectItem = "SELECT * FROM `tbl_data_item_add`";
                                                            $hasilQuery = $koneksi->query($sqlSelectItem);

                                                            while($rows = $hasilQuery->fetch_array() ) {?>
                                                                <option value="<?php echo $rows[0]."+%".$rows[2]?>"><?php echo strtoupper($rows[1]); ?></option>
                                                            <?php }?>
                                                        </select>
                                                        <input type="hidden" name="itemId" id="itemId" value="<?=$row['id_item_add']; ?>" >
                                                    </div>

                                                    <div class="form-group col-md-5">
                                                        <label for="weight">Weight</label>
                                                        <input type="text" class="form-control" id="weight" value="<?=$row['weight']; ?>" name="weight" placeholder="Weight">
                                                    </div>

                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="Quantity">Quantity</label>
                                                    <input type="text" class="form-control" id="Quantity" value="<?=$row['quantity']; ?>" name="Quantity" placeholder="Quantity">
                                                </div>



                                                <input type="hidden" name="updated-additive" value="update" />

                                                <div class="form-group mb-4">
                                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                                    <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                                                </div>

                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        //$('#productName').val("<?//=$row['packaging_name']; ?>//");
                                                        $("#additive").change(function () {
                                                            // $("#prints").text($(this).find('option:selected').text());
                                                            var buff = $("#additive").val($(this).val());
                                                            var splitText = $(this).val().split("+%"); // splitText[0] - id

                                                            $("#weight").val(splitText[1]);
                                                            $("#itemId").val(splitText[0]); // idItem
                                                            console.log($(this).val().split("+%"));

                                                            var selectedItemCode = $(this).find('option:selected').text();
                                                            var arr =  selectedItemCode.split("-");
                                                            var typeItem = arr[0].split("P");

                                                            console.log(typeItem);
                                                            console.log(arr);

                                                            // PARSING ITME CODE to Product Type
                                                            $("#prints").val("COVER CAP");
                                                            console.log("COVER CAP");

                                                        });
                                                    });
                                                </script>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
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
            $(document).ready(function(){
                $(".datepicker-here").datepicker({
                    dateFormat: "yyyy-mm-dd",
                    zIndexOffset: 1040

                });
                $(".datepicker-here").css('z-index','99999 !important');
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
<?php
