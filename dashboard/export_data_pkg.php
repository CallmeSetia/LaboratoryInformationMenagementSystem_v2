<?php
include  '../koneksi/koneksi.php';
date_default_timezone_set('Asia/Jakarta');
$DB_HOST = "127.0.0.1";
$DB_USER = "root";
$DB_PASS = "";
$DB_DATABASE = "lims";
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}

$hasil = $koneksi->query("SELECT * FROM `tbl_utama_pkg`
LEFT JOIN tbl_data_item_pkg ON tbl_data_item_pkg.id_item_pkg = tbl_utama_pkg.id_item_pkg");

if($num_rows =$hasil->num_rows > 0){
    $delimiter = ",";
    $filename = "data_utama_packaging_".formatTanggal()."_".date("H:i").".csv";

    // Create a file pointer
    $f = fopen('php://memory', 'w');

    // Set column headers
    $fields = array('Date', 'Receive Time', 'Item Code', 'Package Name', 'Supplier Name', 'Quantity', 'Packaging Condition', 'Status', 'Remarks', 'Submitted', 'Received', 'Finnish Time');


    fputcsv($f, $fields, $delimiter);

    // Output each row of the data, format line as csv and write to file pointer
    while($row = $hasil->fetch_assoc()){

        $lineData = array($row['date'], $row['receive_time'], $row['item_code'], $row['packaging_name'], $row['suplier_name'], $row['quantity'], $row['packaging_condition'], $row['status'], $row['remark'], $row['submitted'], $row['received'], $row['finnish_time']);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file
    fseek($f, 0);

    // Set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}

function formatTanggal() {
    date_default_timezone_set('Asia/Jakarta');

    $tgl = date("d"); // date("Y-m-d")
    $bulan =  date("m");
    $tahun = date("Y");

    $templateNamaBulan = ["Jan", "Feb", "Mar", "Apr","May", "Jun","Jul","Aug", "Sep", "Oct", "Nov","Dec"];

    $bulan = $templateNamaBulan[((int) $bulan) - 1];

    return $tgl."-".$bulan."-".$tahun;
}
?>