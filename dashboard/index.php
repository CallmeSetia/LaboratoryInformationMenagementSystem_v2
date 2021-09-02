<?php
session_start();
//print_r($_SESSION);
require_once  '../koneksi/koneksi.php';

// ==== KONEKSI DATABASE
//$incoming_data = $_POST['jenisData'];
$DB_HOST = "127.0.0.1";
$DB_USER = "root";
$DB_PASS = "";
$DB_DATABASE = "lims";
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}
// ====== END KONEKSI

$issueDates = formatTanggal();
$ReceiveTime = date("H:i");

function formatTanggal() {
    date_default_timezone_set('Asia/Jakarta');

    $tgl = date("d"); // date("Y-m-d")
    $bulan =  date("m");
    $tahun = date("Y");

    $templateNamaBulan = ["Jan", "Feb", "Mar", "Apr","May", "Jun","Jul","Aug", "Sep", "Oct", "Nov","Dec"];

    $bulan = $templateNamaBulan[((int) $bulan) - 1];

    return $tgl."-".$bulan."-".$tahun;
}

function tampilTombolTambahData()
{
    if (strtolower((string)$_SESSION['role']) == "siteman") {
        if ($_GET['page'] == "packaging") {
            return ' <button class="btn btn-success btn-rounded" data-toggle="modal" data-target="#modal-pkg-tambah" href="javascript:void(0)"><i class="mdi mdi-plus-thick"></i></button>';
        }
        else {
            return ' <button class="btn btn-success btn-rounded" data-toggle="modal" data-target="#modal-add-tambah" href="javascript:void(0)"><i class="mdi mdi-plus-thick"></i></button>';
        }

    }
}
function tampilTombolExportData()
{
    if (strtolower((string)$_SESSION['role']) == "analyst") {
        if ($_GET['page'] == "packaging") {
            return '<a href="export_data_pkg.php"><button class="btn btn-success btn-rounded"  href="javascript:void(0)"><i class="fa fa-download"></i> </button></a>';
        }
        else {
            return '<a href="export_data_add.php"   ><button class="btn btn-success btn-rounded"  href="javascript:void(0)"><i class="fa fa-download"></i> </button></a>';
        }

    }
}

//getId("pm", $row['id_item_pkg']); // pm, 19
function getId($type, $number) {
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_pkg_". $type ." WHERE id_" . $type ."=". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            return $rowP["id_". $type];
        }
    }
}

function getDetailPKG($type, $number){
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
//    echo $type;
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_pkg_". $type ." LEFT JOIN tbl_utama_pkg ON tbl_detail_pkg_". $type . ".id_" . $type." = tbl_utama_pkg.id_utama LEFT JOIN tbl_data_item_pkg ON tbl_utama_pkg.id_item_pkg = tbl_data_item_pkg.id_item_pkg WHERE id_utama = ". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            if ($type == "pm") {
                return ($rowP['id_pm']. '@'  .$rowP['quantity']. '@'  .$rowP['packaging_name']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['cek_sampel']. '@'  .$rowP['warna_botol']. '@'  .$rowP['kondisi_screw']. '@'  .$rowP['tempat_lubang']. '@'  .$rowP['label_depan']. '@'  .$rowP['label_belakang']. '@'  .$rowP['cacat']. '@'  .$rowP['posisi_ldb']. '@'  .$rowP['kotoran']. '@'  .$rowP['benda_asing']. '@'  .$rowP['npt']. '@'  .$rowP['doc_no']);

            } elseif ($type == "pd") {
                return ($rowP['id_pd']. '@'  .$rowP['quantity']. '@'  .$rowP['packaging_name']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['cek_sampel']. '@'  .$rowP['warna_drum']. '@'  .$rowP['terdapat_lk']. '@'  .$rowP['terdapat_lpb']. '@'  .$rowP['kondisi_seal']. '@'  .$rowP['kotoran']. '@'  .$rowP['karat']. '@'  .$rowP['benda_asing']. '@'  .$rowP['bau_ytb']. '@'  .$rowP['doc_no']);
            } elseif ($type == "pcb") {
                return ($rowP['id_pcb']. '@'  .$rowP['quantity']. '@'  .$rowP['packaging_name']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['cek_sampel']. '@'  .$rowP['kondisi_cart']. '@'  .$rowP['warna_cart']. '@'  .$rowP['kotoran_l']. '@'  .$rowP['gambar']. '@'  .$rowP['label']. '@'  .$rowP['kotoran_d']. '@'  .$rowP['coa']. '@'  .$rowP['doc_no']);
            } elseif ($type == "pc") {
//                echo "INI PC";
                return ($rowP['id_pc']. '@'  .$rowP['quantity']. '@'  .$rowP['packaging_name']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['cek_sampel']. '@'  .$rowP['warna_cap']. '@'  .$rowP['kotoran']. '@'  .$rowP['goresan_pc']. '@'  .$rowP['cacat_pc']. '@'  .$rowP['lubang']. '@'  .$rowP['kondisi_seal']. '@'  .$rowP['terdapat_bami']. '@'  .$rowP['doc_no']);
            } elseif ($type == "p") {
                return ($rowP['id_p']. '@'  .$rowP['quantity']. '@'  .$rowP['packaging_name']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['cek_sampel']. '@'  .$rowP['warna_pail']. '@'  .$rowP['terdapat_lk']. '@'  .$rowP['terdapat_lpb']. '@'  .$rowP['kondisi_seal']. '@'  .$rowP['kotoran']. '@'  .$rowP['karat']. '@'  .$rowP['benda_asing']. '@'  .$rowP['kotoran_ytb']. '@'  .$rowP['doc_no']);
            } elseif ($type == "ibc") {
                return ($rowP['id_ibc']. '@'  .$rowP['quantity']. '@'  .$rowP['packaging_name']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['cek_sampel']. '@'  .$rowP['kondisi_vn']. '@'  .$rowP['terdapat_lk']. '@'  .$rowP['kotoran']. '@'  .$rowP['air_oli']. '@'  .$rowP['doc_no']);
            } else {
                return 0;
            }
        }
    }
}

function getIdA($number) {
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_add WHERE id_add=". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            return $rowP["id_add"];
        }
    }
}

function getDetailADD($number){
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_add LEFT JOIN tbl_utama_add ON tbl_detail_add.id_add = tbl_utama_add.id_utama LEFT JOIN tbl_data_item_add ON tbl_utama_add.id_item_add = tbl_data_item_add.id_item_add WHERE id_utama = ". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            return ($rowP['id_add']. '@'  .$rowP['item_check']. '@'  .$rowP['quantity']. '@'  .$rowP['nama_produk']. '@'  .$rowP['tgl_cek']. '@'  .$rowP['approval']. '@'  .$rowP['lot_no']. '@'  .$rowP['nama_psdd']. '@'  .$rowP['berat_psdpl']. '@'  .$rowP['seal_tdb']. '@'  .$rowP['bocorl']. '@'  .$rowP['kotoranba']. '@'  .$rowP['penyok']. '@'  .$rowP['karat']. '@'  .$rowP['doc_no']);
        }
    }
}

function tampilTombolPrint($idAF, $idTF, $pP, $dataIn, $approval, $tubes = NULL){
    if($idAF == $idTF && $approval == 1) {
        return '<form action="../dashboard/halaman_print.php?data='. $pP .'" method="POST"> <button name="data_print" value="'. $dataIn .'" class="btn btn-primary mb-2 ">Print</button></form>';
    }
    else {
        return '<button class="btn btn-primary mb-2 " disabled>Print</button></form>';
    }
}

function tampilTombolEditData($jenis, $pkgn, $itmc, $idipg, $tglIn, $jmlP){
    if (strtolower((string) $_SESSION['role']) == "analyst") {
        return '<form action="edit_data.php?type='.$jenis.'" method="POST"><button name="data_edit" value="'.$jenis.'#'.$pkgn.'#'.$itmc.'#'.$idipg.'#'.$tglIn.'#'.$jmlP.'" class="btn btn-primary mb-2 ">Edit</button></form>';
    }
    else if (strtolower((string) $_SESSION['role']) == "siteman") {
        return '<form action="edit_data_utama.php" method="POST"><input type="hidden" name="mode" value="'.$pkgn.'"/><button name="id_utama" value="'.$jenis.'" class="btn btn-primary mb-2 ">Edit</button></form>';
    }
}

function tampilTombolHapusData($jenis, $pkgn, $itmc, $idipg, $tglIn){
    if (strtolower((string) $_SESSION['role']) == "analyst") {
//        return '<form action="hapus_data_utama.php?type='.$jenis.'" method="POST"><button name="data_edit" value="'.$jenis.'#'.$pkgn.'#'.$itmc.'#'.$idipg.'#'.$tglIn.'" class="btn btn-primary mb-2 ">Edit</button></form>';
    }
    else if (strtolower((string) $_SESSION['role']) == "siteman") {
        return '<form action="hapus_data_utama.php" method="POST"><input type="hidden" name="mode" value="'.$pkgn.'"/><input type="hidden" name="jenis" value="'.$itmc.'"/><input type="hidden" name="id_pkg" value="'.$idipg.'"/> <button name="id_utama" value="'.$jenis.'" class="btn btn-primary mb-2 ">Hapus</button></form>';
    }
}

function tampilTabel($jenis_tabel, $koneksi) {
    if (strtolower($jenis_tabel) == "packaging"){
        echo '
         <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                 <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <!-- <th>Doc No</th> -->
                                            <th>Receive Time</th>
                                            <th>Item Code</th>
                                            <th>Packaging Name</th>
                                            <th>Supplier Name</th>
                                            <th>Quantity</th>
                                            <th>Packaging Condition</th>
                                            <th>Status</th>
                                            <th>Remark</th>
                                            <th>Submitted</th>
                                            <th>Received</th>
                                            <th>Finnish Time</th>
                                            <th>Status Approval</th>
                                            <th colspan="" class=""> ACTION</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody> ';

                                        // ====== END KONEKSI
                                        $hasilQuery = $koneksi->query("SELECT * FROM `tbl_utama_pkg` LEFT JOIN tbl_data_item_pkg ON tbl_data_item_pkg.id_item_pkg = tbl_utama_pkg.id_item_pkg");
                                        if ($num_rows = $hasilQuery->num_rows > 0) {
                                            while ($row = $hasilQuery->fetch_assoc()){
                                                echo '
                                                            <tr>
                                                                <td>'.$row['date'] .'</td>
                                                             <!--   <td>'.$row['doc_no'] .'</td> -->
                                                                <td>'.$row['receive_time'] .'</td>
                                                                <td>'.$row['item_code'] .'</td>
                                                                <td>'.$row['packaging_name'] .'</td>
                                                                <td>'.$row['suplier_name'] .'</td>
                                                                <td>'.$row['quantity'] .'</td>
                                                                <td>'.$row['packaging_condition'] .'</td>
                                                                <td>'.$row['status'] .'</td>
                                                                <td>'.$row['remark'] .'</td>
                                                                <td>'.$row['submitted'] .'</td>
                                                                <td>'.$row['received'] .'</td>
                                                                <td>'.$row['finnish_time'] .'</td>
                                                               ';
                                                // KONVERSI JADi Jenis Package
                                                $itemCheck = strtolower($row['item_check']);
                                                $jenisPackage = "";
                                                $pkg_name = $row['packaging_name'];
                                                $itm_code = $row['item_code'];
                                                $quantity = $row['quantity'];

                                                $id_pkg = $row['id_item_pkg'];
                                                $id_utama = $row['id_utama'];

                                                $tgl_masuk = $row['date'];
                                                $idA = $row['id_utama'];
                                //                echo $itemCheck."-";

                                                if ($itemCheck == "botol") {
                                                    $jenisPackage = "material";
                                                    $idT = getId("pm", $row['id_utama']);
                                                    $halamanPrint = "pm";
                                                    $dataCol = getDetailPKG("pm", $row['id_utama']);

                                                }
                                                else if ( $itemCheck == "tube") {
                                                    $jenisPackage = "material";
                                                    $idT = getId("pm", $row['id_utama']);
                                                    $halamanPrint = "pm";
                                                    $dataCol = getDetailPKG("pm", $row['id_utama']);
                                                }
                                                elseif ($itemCheck == "cap" || $itemCheck == "cover cap") {

                                                    $jenisPackage = "cap";
                                                    $idT = getId("pc", $row['id_utama']);
                                //                    echo "hai";
                                                    $halamanPrint = "pc";
                                                    $dataCol = getDetailPKG("pc", $row['id_utama']);
                                                } elseif ($itemCheck == "pail") {
                                                    $jenisPackage = "pail";
                                                    $idT = getId("p", $row['id_utama']);
                                                    $halamanPrint = "p";
                                                    $dataCol = getDetailPKG("p", $row['id_utama']);
                                                } elseif ($itemCheck == "drum") {
                                                    $jenisPackage = "drum";
                                                    $idT = getId("pd", $row['id_utama']);
                                                    $halamanPrint = "pd";
                                                    $dataCol = getDetailPKG("pd", $row['id_utama']);
                                                } elseif ($itemCheck == "carton") {
                                                    $jenisPackage = "cartonbox";
                                                    $idT = getId("pcb", $row['id_utama']);
                                                    $halamanPrint = "pcb";
                                                    $dataCol = getDetailPKG("pcb", $row['id_utama']);
                                                } elseif ($itemCheck == "ibc") {
                                                    $jenisPackage = "ibc";
                                                    $idT = getId("ibc", $row['id_utama']);
                                                    $halamanPrint = "ibc";
                                                    $dataCol = getDetailPKG("ibc", $row['id_utama']);
                                                }
                                                else {
                                                    $idT = "";
                                                    $halamanPrint = "";
                                                    $dataCol = "";
                                                }

                                                if ($itemCheck == "label") {
                                                    $jenisPackage = "lbl";

                                                }
                                                // APPROVAL

                                                $approval = 0;
                                                $sql_select_aproval = "SELECT * FROM tbl_detail_pkg_" . $halamanPrint . " WHERE id_".$halamanPrint." = '$id_utama'";
                                                $hasilApproval = $koneksi->query($sql_select_aproval);
                                                if ($hasilApproval) {
                                                    if ($num_rows = $hasilApproval->num_rows > 0) {
                                                        $row_detail = $hasilApproval->fetch_assoc();

                                                        if ($row_detail['approval'] != 0 && $row_detail['approval'] != NULL  ) {
                                                            $approval = 1;
                                                        }
                                                    }
                                                }

                                                if ($approval == 1 ) {
                                                    echo "<td>OKE</td>";
                                                }
                                                else {
                                                    echo "<td>TIDAK</td>";
                                                }

                                                // ACTION
                                                if (strtolower((string) $_SESSION['role']) == "analyst") {
                                                    echo '<td>'.tampilTombolEditData($jenisPackage, $pkg_name, $itm_code, $id_utama, $tgl_masuk, $quantity). tampilTombolPrint($idA, $idT, $halamanPrint, $dataCol, $approval) .'</td>';
                                                }
                                                else if (strtolower((string) $_SESSION['role']) == "siteman") {
                                                    echo '<td>'.tampilTombolEditData($row['id_utama'], "packaging", NULL, NULL, NULL, NULL).tampilTombolHapusData($row['id_utama'], "packaging", $jenisPackage, $id_utama, NULL).'</td>';
                                                }

                                                echo ' </tr>';
                                            }
                                        }
                                        else {
                                            echo '
                                                <tr>
                                                    <td colspan="14" class="text-center">Tidak Ada Data</td>
                                                </tr>
                                                ';
                                        }
        echo '                </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>';

    }

    // ADDITIVE
    else if (strtolower($jenis_tabel) == "additive") {

        echo '
           <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                 <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                  <thead>
                                      <tr>
                                        <th>Date</th>
                                        <th>Doc No</th>
                                        <th>Lot Number</th>
                                        <th>Additive</th>
                                        <th>Weight</th>
                                        <th>Quantity</th>
                                        <th>Approval</th>
                                        <th colspan="" class=""> ACTION</th>
                                       </tr>
                                    </thead>
                                   <tbody>';

        // ====== END KONEKSI
        $hasilQuery = $koneksi->query("SELECT * FROM `tbl_utama_add` LEFT JOIN tbl_data_item_add ON tbl_data_item_add.id_item_add = tbl_utama_add.id_item_add");
        $jenisPackage = "add";
        if ($num_rows = $hasilQuery->num_rows > 0) {
            while ($row = $hasilQuery->fetch_assoc()) {
                echo '
                <tr>
                     <td>'.$row['date'] .'</td>
                     <td>'.$row['doc_no'] .'</td> 
                     <td>'.$row['lot_no'] .'</td>
                     <td>'.$row['additive'] .'</td>
                     <td>'.$row['weight'] .'</td>
                     <td>'.$row['quantity'] .'</td>
                     ';
                $pkg_name = $row['additive'];
                $itm_code = $row['lot_no'];
                $id_pkg = $row['id_utama'];
                $tgl_masuk = $row['date'];
                $quantity = $row['quantity'];

                $idA = $row['id_utama'];
                $idT = getIdA($row['id_utama']);
                $dataCol = getDetailADD($row['id_utama']);

                // APPROVAL
                $approval = 0;
                $sql_select_aproval = "SELECT * FROM tbl_detail_add  WHERE id_add = '$id_pkg'";
                $hasilApproval = $koneksi->query($sql_select_aproval);
                if ($hasilApproval) {
                    if ($num_rows = $hasilApproval->num_rows > 0) {
                        $row_detail = $hasilApproval->fetch_assoc();

                        if ($row_detail['approval'] != 0 && $row_detail['approval'] != NULL  ) {
                            $approval = 1;
                        }
                    }
                }

                if ($approval == 1 ) {
                    echo "<td>OKE</td>";
                }
                else {
                    echo "<td>TIDAK</td>";
                }
                if (strtolower((string) $_SESSION['role']) == "analyst") {
                    echo '<td>'.tampilTombolEditData($jenisPackage, $pkg_name, $itm_code, $id_pkg, $tgl_masuk, $quantity). tampilTombolPrint($idA, $idT, "add", $dataCol, $approval) .'</td>';
                }
                else if (strtolower((string) $_SESSION['role']) == "siteman") {
                    echo '<td>'.tampilTombolEditData($row['id_utama'], "additive", NULL, NULL, NULL, NULL).tampilTombolHapusData($row['id_utama'], "additive", NULL, NULL, NULL).'</td>';
                }


                echo '</tr>';
            }

        }
        else {
            echo '
                <tr>
                    <td colspan="9" class="text-center">Tidak AdAa Data</td>
                </tr>
                ';
        }
        echo '                </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>';
    }
}


/// MEKANISME INSERT/ TAMBAH DATA
///
if (isset($_POST['submited'])) {
    // AMBIL DATA USER INPUT
     print_r($_POST);
    if($_POST['submited'] == "tambah-add") {

        $docNumber = $_POST['docNumber'];
        $issuedDate = $_POST['issuedDate'];
        $lotNumber = $_POST['lotNumber'];

        $itemId = $_POST['itemId'];
        $itemWeight = $_POST['itemWeight'];

        $Quantity = $_POST['Quantity'];

        // ==== KONEKSI DATABASE
        $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

        if ($koneksi->connect_errno) {
            echo "Connection Error: " . $koneksi->connect_error;
        }
        // ====== END KONEKSI

        $sql_insert = "INSERT INTO `tbl_utama_add`(`id_utama`, `doc_no`, `date`, `lot_no`, `id_item_add`, `quantity`) VALUES ('NULL','$docNumber','$issuedDate','$lotNumber','$itemId','$Quantity')";
        $hasilInsert = $koneksi->query($sql_insert);

        if ($hasilInsert) {
            $FLAG_INSERT = 1;
        }
        else {
            $FLAG_INSERT = -1;
        }

    }
    else if ($_POST['submited'] == "tambah-pkg") {
        $docNumber = $_POST['docNumber'];
        $issuedDate = $_POST['issuedDate'];
        $receiveTime = $_POST['receiveTime'];

        $itemCode = $_POST['itemCode'];
        $itemType = $_POST['itemType'];
        $itemId = $_POST['itemId'];
        $productName = $_POST['productName'];

        $Quantity = $_POST['Quantity'];
        $PackagingCondition = $_POST['PackagingCondition'];

        $status = $_POST['status'];
        $remark = $_POST['remark'];

        $Submitted = $_POST['Submitted'];
        $Received = "";

        // ==== KONEKSI DATABASE
        $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

        if ($koneksi->connect_errno) {
            echo "Connection Error: " . $koneksi->connect_error;
        }
        // ====== END KONEKSI

        $sqlInsertUtama = "INSERT INTO `tbl_utama_pkg`(`id_utama`, `doc_no`, `date`, `receive_time`,  `id_item_pkg`, `item_check`, `quantity`, `packaging_condition`, `status`, `remark`, `submitted`, `received`) 
                        VALUES ('NULL','$docNumber','$issuedDate','$receiveTime', '$itemId','$itemType','$Quantity', '$PackagingCondition',
                                '$status','$remark','$Submitted','$Received')";

        $hasilInsert = $koneksi->query($sqlInsertUtama);

        if($hasilInsert) {
            $FLAG_INSERT = 1;
        }
        else {
            $FLAG_INSERT = -1;
        }

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

            <!-- Page-Title -->
            <?php
                if (isset($_GET['page'])) {
                    if($_GET['page'] == "packaging") {
                        echo ' <div class="page-title-box">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h4 class="page-title mb-1">PACKAGING</h4>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active"></li>
                                        </ol>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="float-right d-none d-md-block">
                                            <div class="dropdown">';
                        echo   tampilTombolTambahData();
                        echo   tampilTombolExportData();

                        echo '              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        tampilTabel("packaging", $koneksi);

                    }
                    else if ($_GET['page'] == "additive") {
                        // echo "additive";
                        echo ' <div class="page-title-box">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h4 class="page-title mb-1">ADDITIVE</h4>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active"></li>
                                        </ol>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="float-right d-none d-md-block">
                                            <div class="dropdown">';
                        echo   tampilTombolTambahData();
                        echo   tampilTombolExportData();

                        echo'                  </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        tampilTabel("additive", $koneksi);

                    }


                }else { ?>
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Dashboard</h4>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 ml-auto" style="text-align: center">
                                                    <a href="index.php?page=additive"><img src="../theme/dist/assets/images/master.png" alt="" class="img-fluid"></a>
                                                    <h5>Additive</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 ml-auto" style="text-align: center">
                                                    <a href="index.php?page=packaging"><img src="../theme/dist/assets/images/inventory.png" alt="" class="img-fluid"></a>
                                                    <h5>Packaging</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end container-fluid -->
                    </div>
                <?php  }

            ?>
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


<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
<script src="../theme/dist/assets/libs/jquery/jquery.min.js"></script>

<!--    TAMBAH DATA PKG SITEMAN-->
  <div id="modal-pkg-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pkg-tambah" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Tambah Data : Packaging</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <fieldset>

<!--                                <label for="docNumber">Document No.</label>-->
                                <input type="hidden" class="form-control" id="docNumber" name="docNumber" placeholder="Doc No" value="">

                            <div class="form-group mb-4">
                                <label for="issuedDate">Issued Date</label>
                                <input type="text" class="form-control" id="issuedDate" name="issuedDate" value="<?php echo $issueDates; ?>" placeholder="Issued Date" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="issuedDate">Receive Time</label>
                                <input type="text" class="form-control" id="receiveTime" name="receiveTime" value="<?php echo $ReceiveTime; ?>" placeholder="Receive Time" required>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="itemCode">Item Code</label> <br>

                                    <select class="selectpicker" id="itemCode" name="itemCode" data-live-search="true" required>
                                        <option value="" selected disabled hidden>Item Code</option>
                                        <?php
                                        $sqlSelectItem = "SELECT * FROM `tbl_data_item_pkg`";
                                        $hasilQuery = $koneksi->query($sqlSelectItem);

                                        while($row = $hasilQuery->fetch_array() ) {?>
                                            <option value="<?php echo $row[0]."+%".$row[2]?>"><?php echo strtoupper($row[1]); ?></option>
                                        <?php }?>
                                    </select>
                                    <!--  <span id="prints">asdsd</span>-->
                                    <input type="hidden" name="itemType" id="prints" value="NULL" >
                                    <input type="hidden" name="itemId" id="itemId" value="NULL" >
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name"  required>
                                </div>

                            </div>

                            <div class="form-group mb-4">
                                <label for="Quantity">Quantity</label>
                                <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="PackagingCondition">Packaging Condition</label>
                                <input type="text" class="form-control" id="PackagingCondition" name="PackagingCondition" placeholder="Packaging Condition" >
                            </div>

                            <div class="form-group mb-4">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status"  placeholder="Status" >
                            </div>

                            <div class="form-group mb-4">
                                <label for="remark">Remark</label>
                                <input type="text" class="form-control" id="remark"  name="remark"  placeholder="Remark" >
                            </div>

                            <div class="form-group mb-4">
                                <label for="Submitted">Submitted Name</label>
                                <input type="text" class="form-control" id="Submitted" value="<?php echo $_SESSION['nama_akun']; ?>" name="Submitted"  placeholder="Submitted Name" required>
                            </div>


                            <input type="hidden" name="submited" value="tambah-pkg" />
                        </fieldset>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
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
                                    $("#docNumber").val("DN-PC-F-034");
                                    console.log("PAIL");
                                }
                            else if (typeItem[1] == 01 || typeItem[1] == "01" ) { // BOTOL
                                    if (arr[1] > 252 && arr[1] < 256) {
                                        $("#prints").val("TUBE");
                                        $("#docNumber").val("DN-PC-F-034");
                                        console.log("TUBE");
                                    }
                                    else {
                                        $("#prints").val("BOTOL");
                                        $("#docNumber").val("DN-PC-F-034");
                                        console.log("BOTOL");
                                    }
                                }
                                else if (typeItem[1] == 04 || typeItem[1] == "04" ) { // DRUM
                                    $("#prints").val("DRUM");
                                    $("#docNumber").val("DN-PC-F-034");
                                    console.log("DRUM");
                                }

                                else if (typeItem[1] == 05 || typeItem[1] == "05" ) { // LABEL
                                    $("#prints").val("LABEL");
                                    console.log("LABEL");
                                }

                                else if (typeItem[1] == 03 || typeItem[1] == "03" ) { // CARTON
                                    $("#prints").val("CARTON");
                                    $("#docNumber").val("DN-PC-F-051");
                                    console.log("CARTON");
                                }

                                else if (typeItem[1] == 02 || typeItem[1] == "02" ) { // CAP
                                    if (arr[1] == 26) {
                                        $("#prints").val("COVER CAP");
                                        $("#docNumber").val("DN-PC-F-049");
                                        console.log("COVER CAP");
                                    }
                                    else {
                                        $("#prints").val("CAP");
                                        $("#docNumber").val("DN-PC-F-049");
                                        console.log("CAP");
                                    }
                                }
                                    // IBC
                                    // else if (typeItem[1] == - || typeItem[1] == "-" ) { // DUMMY
                                    //     $("#prints").val("CARTON");
                                    //     $("#docNumber").val("DN-PC-F-034");
                                    //     console.log("CARTON");
                                // }

                                else { // DRUM
                                    $("#prints").val("DRUM");
                                    $("#docNumber").val("DN-PC-F-034");
                                    console.log("DRUM");
                                }
                                
                                
                                // console.log("ID NUMBER " + $("#docNumber").val());
                            });
                        });
                    </script>
                </form>
            </div>
        </div>
    </div>

    <!--    TAMBAH DATA ADD SITEMAN-->
    <div id="modal-add-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-tambah" aria-hidden="true">
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
                            <form method="POST">


                                <input type="hidden" class="form-control" id="docNumber" name="docNumber" placeholder="Doc No" value="DN-PC-F-041">
                                <div class="form-group mb-4">
                                    <label for="issuedDate">Issued Date</label>
                                    <input type="text" class="form-control" id="issuedDate" name="issuedDate"  value="<?= $issueDates; ?>" placeholder="Issued Date">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="lotNumber">Lot Number</label>
                                    <input type="text" class="form-control" id="lotNumber" name="lotNumber" placeholder="Lot Number" required>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="itemCode">Item Code</label> <br>

                                        <select class="selectpicker"  id="additive" name="additive" data-live-search="true">
                                            <option value="" selected disabled hidden>Additive</option>
                                            <?php
                                            $sqlSelectItem = "SELECT * FROM `tbl_data_item_add`";
                                            $hasilQuery = $koneksi->query($sqlSelectItem);

                                            while($row = $hasilQuery->fetch_array() ) {?>
                                                <option value="<?php echo $row[0]."+%".$row[2]?>"><?php echo strtoupper($row[1]); ?></option>
                                            <?php }?>
                                        </select>
                                        <!--  <span id="prints">asdsd</span>-->
                                        <input type="hidden" name="itemType" id="prints" value="NULL" >
                                        <input type="hidden" name="itemId" id="itemIdAdditive" value="NULL" >
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="Weight">Weight</label>
                                        <input type="text" class="form-control" id="itemWeight" name="itemWeight" placeholder="Weight" required>
                                    </div>

                                </div>

                                <div class="form-group mb-4">
                                    <label for="Quantity">Quantity</label>
                                    <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                                </div>

                                <input type="hidden" name="submited" value="tambah-add" />
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                    <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $("#additive").change(function () {
                                            // $("#prints").text($(this).find('option:selected').text());
                                            var buff = $("#itemWeight").val($(this).val());
                                            var splitText = $(this).val().split("+%"); // splitText[0] - id

                                            $("#itemWeight").val(splitText[1]);
                                            $("#itemIdAdditive").val(splitText[0]); // idItem
                                            // console.log($(this).val().split("+%"));

                                            var selectedItemCode = $(this).find('option:selected').text();
                                            var arr =  selectedItemCode.split("-");
                                            var typeItem = arr[0].split("P");

                                            console.log(typeItem);
                                            console.log(arr);
                                            console.log(  $("#itemIdAdditive").val());

                                            // PARSING ITME CODE to Product Type


                                            // console.log($("#prints").val());

                                        });
                                    });
                      </script>
                 </form>
            </div>
        </div>
    </div>



</div>

    <!--    EDIT DATA PKG SITEMAN-->
    <div id="modal-pkg-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-pkg-tambah" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Tambah Data : Packaging</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <fieldset>

                            <!--                                <label for="docNumber">Document No.</label>-->
                            <input type="hidden" class="form-control" id="docNumber" name="docNumber" placeholder="Doc No" value="">

                            <div class="form-group mb-4">
                                <label for="issuedDate">Issued Date</label>
                                <input type="text" class="form-control" id="issuedDate" name="issuedDate" value="<?php echo $issueDates; ?>" placeholder="Issued Date" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="issuedDate">Receive Time</label>
                                <input type="text" class="form-control" id="receiveTime" name="receiveTime" value="<?php echo $ReceiveTime; ?>" placeholder="Receive Time" required>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="itemCode">Item Code</label> <br>

                                    <select class="selectpicker" id="itemCode" name="itemCode" data-live-search="true" required>
                                        <option value="" selected disabled hidden>Item Code</option>
                                        <?php
                                        $sqlSelectItem = "SELECT * FROM `tbl_data_item_pkg`";
                                        $hasilQuery = $koneksi->query($sqlSelectItem);

                                        while($row = $hasilQuery->fetch_array() ) {?>
                                            <option value="<?php echo $row[0]."+%".$row[2]?>"><?php echo strtoupper($row[1]); ?></option>
                                        <?php }?>
                                    </select>
                                    <!--  <span id="prints">asdsd</span>-->
                                    <input type="hidden" name="itemType" id="prints" value="NULL" >
                                    <input type="hidden" name="itemId" id="itemId" value="NULL" >
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name"  required>
                                </div>

                            </div>

                            <div class="form-group mb-4">
                                <label for="Quantity">Quantity</label>
                                <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="PackagingCondition">Packaging Condition</label>
                                <input type="text" class="form-control" id="PackagingCondition" name="PackagingCondition" placeholder="Packaging Condition" >
                            </div>

                            <div class="form-group mb-4">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status"  placeholder="Status" >
                            </div>

                            <div class="form-group mb-4">
                                <label for="remark">Remark</label>
                                <input type="text" class="form-control" id="remark"  name="remark"  placeholder="Remark" >
                            </div>

                            <div class="form-group mb-4">
                                <label for="Submitted">Submitted Name</label>
                                <input type="text" class="form-control" id="Submitted" value="<?php echo $_SESSION['nama_akun']; ?>" name="Submitted"  placeholder="Submitted Name" required>
                            </div>


                            <input type="hidden" name="submited" value="tambah-pkg" />
                        </fieldset>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
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
                                    $("#docNumber").val("DN-PC-F-034");
                                    console.log("PAIL");
                                }
                            else if (typeItem[1] == 01 || typeItem[1] == "01" ) { // BOTOL
                                    if (arr[1] > 252 && arr[1] < 256) {
                                        $("#prints").val("TUBE");
                                        $("#docNumber").val("DN-PC-F-034");
                                        console.log("TUBE");
                                    }
                                    else {
                                        $("#prints").val("BOTOL");
                                        $("#docNumber").val("DN-PC-F-034");
                                        console.log("BOTOL");
                                    }
                                }
                                else if (typeItem[1] == 04 || typeItem[1] == "04" ) { // DRUM
                                    $("#prints").val("DRUM");
                                    $("#docNumber").val("DN-PC-F-034");
                                    console.log("DRUM");
                                }

                                else if (typeItem[1] == 05 || typeItem[1] == "05" ) { // LABEL
                                    $("#prints").val("LABEL");
                                    console.log("LABEL");
                                }

                                else if (typeItem[1] == 03 || typeItem[1] == "03" ) { // CARTON
                                    $("#prints").val("CARTON");
                                    $("#docNumber").val("DN-PC-F-051");
                                    console.log("CARTON");
                                }

                                else if (typeItem[1] == 02 || typeItem[1] == "02" ) { // CAP
                                    if (arr[1] == 26) {
                                        $("#prints").val("COVER CAP");
                                        $("#docNumber").val("DN-PC-F-049");
                                        console.log("COVER CAP");
                                    }
                                    else {
                                        $("#prints").val("CAP");
                                        $("#docNumber").val("DN-PC-F-049");
                                        console.log("CAP");
                                    }
                                }
                                    // IBC
                                    // else if (typeItem[1] == - || typeItem[1] == "-" ) { // DUMMY
                                    //     $("#prints").val("CARTON");
                                    //     $("#docNumber").val("DN-PC-F-034");
                                    //     console.log("CARTON");
                                // }

                                else { // DRUM
                                    $("#prints").val("DRUM");
                                    $("#docNumber").val("DN-PC-F-034");
                                    console.log("DRUM");
                                }


                                // console.log("ID NUMBER " + $("#docNumber").val());
                            });
                        });
                    </script>
                </form>
            </div>
        </div>
    </div>
    <!--    EDIT DATA ADD SITEMAN-->
    <div id="modal-add-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-tambah" aria-hidden="true">
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
                            <form method="POST">


                                <input type="hidden" class="form-control" id="docNumber" name="docNumber" placeholder="Doc No" value="DN-PC-F-041">
                                <div class="form-group mb-4">
                                    <label for="issuedDate">Issued Date</label>
                                    <input type="text" class="form-control" id="issuedDate" name="issuedDate"  value="<?= $issueDates; ?>" placeholder="Issued Date">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="lotNumber">Lot Number</label>
                                    <input type="text" class="form-control" id="lotNumber" name="lotNumber" placeholder="Lot Number" required>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="itemCode">Item Code</label> <br>

                                        <select class="selectpicker"  id="additive" name="additive" data-live-search="true">
                                            <option value="" selected disabled hidden>Additive</option>
                                            <?php
                                            $sqlSelectItem = "SELECT * FROM `tbl_data_item_add`";
                                            $hasilQuery = $koneksi->query($sqlSelectItem);

                                            while($row = $hasilQuery->fetch_array() ) {?>
                                                <option value="<?php echo $row[0]."+%".$row[2]?>"><?php echo strtoupper($row[1]); ?></option>
                                            <?php }?>
                                        </select>
                                        <!--  <span id="prints">asdsd</span>-->
                                        <input type="hidden" name="itemType" id="prints" value="NULL" >
                                        <input type="hidden" name="itemId" id="itemId" value="NULL" >
                                    </div>

                                    <div class="form-group col-md-5">
                                        <label for="Weight">Weight</label>
                                        <input type="text" class="form-control" id="itemWeight" name="itemWeight" placeholder="Weight" required>
                                    </div>

                                </div>

                                <div class="form-group mb-4">
                                    <label for="Quantity">Quantity</label>
                                    <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                                </div>

                                <input type="hidden" name="submited" value="tambah-add" />
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                    <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $("#additive").change(function () {
                                            // $("#prints").text($(this).find('option:selected').text());
                                            var buff = $("#itemWeight").val($(this).val());
                                            var splitText = $(this).val().split("+%"); // splitText[0] - id

                                            $("#itemWeight").val(splitText[1]);
                                            $("#itemId").val(splitText[0]); // idItem
                                            // console.log($(this).val().split("+%"));

                                            var selectedItemCode = $(this).find('option:selected').text();
                                            var arr =  selectedItemCode.split("-");
                                            var typeItem = arr[0].split("P");

                                            console.log(typeItem);
                                            console.log(arr);

                                            // PARSING ITME CODE to Product Type


                                            // console.log($("#prints").val());

                                        });
                                    });
                                </script>
                            </form>
                    </div>
            </div>
        </div>



    </div>




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
