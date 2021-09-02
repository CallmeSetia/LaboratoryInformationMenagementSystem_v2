<?php
require_once  '../koneksi/koneksi.php';
session_start();

$incoming_data = $_POST['jenisData'];
$inD_buffer = explode('#', $incoming_data);


$FLAG_AMAN = 0;
function throwData() {
    function grabData($tabData, $idData) {
        error_reporting(0);
        $incoming_data = $_POST['jenisData'];
        $DB_HOST = "127.0.0.1";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_DATABASE = "lims";
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
        $hasilQ = $conn->query("SELECT id_". $tabData ." FROM tbl_detail_pkg_". $tabData . " WHERE id_". $tabData . " = " . $idData);
        $rowD = $hasilQ->fetch_assoc();
        //print_r($hasilQ);
        //echo "<br>";
        //print_r($rowD);
        //echo "<br>";
        //return $rowD;
        //echo strtolower($rowD[0]);
        if (null !== $rowD['id_'.$tabData]) {
            return($rowD['id_'.$tabData]);
        } else {
            return "404 Not Found";
        }
    }
    function grabDataAdd($tabData, $idData) {
        error_reporting(0);
        $incoming_data = $_POST['jenisData'];
        $DB_HOST = "127.0.0.1";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_DATABASE = "lims";
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
        $hasilQ = $conn->query("SELECT id_add FROM tbl_detail_add WHERE id_add = " . $idData);
        $rowD = $hasilQ->fetch_assoc();
        //print_r($hasilQ);
        //echo "<br>";
        //print_r($rowD);
        //echo "<br>";
        //return $rowD;
        //echo strtolower($rowD[0]);
        if (null !== $rowD['id_'.$tabData]) {
            return($rowD['id_'.$tabData]);
        } else {
            return "404 Not Found";
        }
    }
    $incoming_data = $_POST['jenisData'];
    $inD_buffer = explode('#', $incoming_data);
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    if (strtolower((string) $inD_buffer[0]) == "pc") {
        print_r($_POST);
        if (grabData("pc", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pc SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_cap = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', kotoran = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', goresan_pc = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', cacat_pc = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', lubang = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', kondisi_seal = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', terdapat_bami = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."' WHERE id_pc=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabData("pc", $inD_buffer[1]) != $inD_buffer[1]) {
            print_r($_POST);
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pc, tgl_cek, approval, jml_produk, cek_sampel, warna_cap, kotoran, goresan_pc, cacat_pc, lubang, kondisi_seal, terdapat_bami) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "ibc") {
        if (grabData("ibc", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_ibc SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', kondisi_vn = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', terdapat_lk = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', kotoran = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', air_oli = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."' WHERE id_ibc=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabData("ibc", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_ibc, tgl_cek, approval, jml_produk, cek_sampel, kondisi_vn, terdapat_lk, kotoran, air_oli) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "p") {
        if (grabData("p", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_p SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_pail = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', terdapat_lk = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', terdapat_lpb = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', kondisi_seal = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', kotoran = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', karat = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', benda_asing = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."', kotoran_ytb = '". $_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8'] ."' WHERE id_p=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabData("p", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_p, tgl_cek, approval, jml_produk, cek_sampel, warna_pail, terdapat_lk, terdapat_lpb, kondisi_seal, kotoran, karat, benda_asing, kotoran_ytb) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "', '".$_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8']."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "pd") {
        if (grabData("pd", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pd SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_drum = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', terdapat_lk = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', terdapat_lpb = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', kondisi_seal = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', kotoran = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', karat = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', benda_asing = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."', bau_ytb = '". $_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8'] ."' WHERE id_pd=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabData("pd", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pd, tgl_cek, approval, jml_produk, cek_sampel, warna_drum, terdapat_lk, terdapat_lpb, kondisi_seal, kotoran, karat, benda_asing, bau_ytb) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "', '".$_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8']."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "pm") {
        if (grabData("pm", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pm SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_botol = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', kondisi_screw = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', tempat_lubang = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', label_depan = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', label_belakang = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', cacat = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', posisi_ldb = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."', kotoran = '". $_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8'] ."', benda_asing = '". $_POST['9,1']."#".$_POST['9,2']."#".$_POST['9,3']."#".$_POST['9,4']."#".$_POST['9,5']."#".$_POST['9,6']."#".$_POST['9,7']."#".$_POST['9,8'] ."', npt = '". $_POST['NPT'] ."' WHERE id_pm=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabData("pm", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pm, tgl_cek, approval, jml_produk, cek_sampel, warna_botol, kondisi_screw, tempat_lubang, label_depan, label_belakang, cacat, posisi_ldb, kotoran, benda_asing, npt) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "', '" . $_POST['8,1'] . "#" . $_POST['8,2'] . "#" . $_POST['8,3'] . "#" . $_POST['8,4'] . "#" . $_POST['8,5'] . "#" . $_POST['8,6'] . "#" . $_POST['8,7'] . "#" . $_POST['8,8'] . "', '" . $_POST['9,1'] . "#" . $_POST['9,2'] . "#" . $_POST['9,3'] . "#" . $_POST['9,4'] . "#" . $_POST['9,5'] . "#" . $_POST['9,6'] . "#" . $_POST['9,7'] . "#" . $_POST['9,8'] . "', '" . $_POST['NPT'] . "')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "pcb") {
        if (grabData("pcb", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pcb SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', kondisi_cart = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', warna_cart = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', kotoran_l = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', gambar = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', label = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', kotoran_d = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', coa = '". $_POST['COA'] ."' WHERE id_pcb=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabData("pcb", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pcb, tgl_cek, approval, jml_produk, cek_sampel, kondisi_cart, warna_cart, kotoran_l, gambar, label, kotoran_d, coa) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '". $_POST['COA'] ."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "add") {
        if (grabDataAdd("add", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_add SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', item_check = '". $_POST['item_check'] . "', nama_produk = '". $_POST['namaProduct'] . "', nama_psdd = '". $_POST['1,1'] . "', berat_psdpl = '". $_POST['2,1'] . "', seal_tdb = '". $_POST['3,1'] . "', bocorl = '". $_POST['4,1'] . "', kotoranba = '". $_POST['5,1'] . "', penyok = '". $_POST['6,1'] . "', karat = '". $_POST['7,1'] ."' WHERE id_add=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
                $FLAG_AMAN = 2;
            } else {
                echo "Data gagal diperbarui!";
                $FLAG_AMAN = 0;
            }
        } elseif (grabDataAdd("pcb", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_add (id_add, item_check, approval, jml_produk, tgl_cek, nama_produk, nama_psdd, berat_psdpl, seal_tdb, bocorl, kotoranba, penyok, karat) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['item_check'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['namaProduct'] . "' ,'" . $_POST['1,1'] . "' ,'" . $_POST['2,1'] . "' ,'" . $_POST['3,1'] . "' ,'" . $_POST['4,1'] . "' ,'" . $_POST['5,1'] . "' ,'" . $_POST['6,1'] . "' ,'" . $_POST['7,1'] ."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
                $FLAG_AMAN = 1;
            } else {
                echo "Data gagal disimpan!";
                $FLAG_AMAN = 0;
            }
        } else {
            echo("galat");
        }
    } else {
        echo '<br><h4>Data tidak dikenali!</h4>';
    }


    // RECEIVED NAME DAN FINISH TIME - BUKAD ADDIRIVE
    if (!(strtolower((string) $inD_buffer[0]) == "add")) {
        $sql_updateReceiveName = "UPDATE `tbl_utama_pkg` SET `finnish_time` = '". $_POST['finnish_time']."', `received` = '". $_POST['received_name']."' WHERE `tbl_utama_pkg`.`id_utama` = ' $inD_buffer[1]'";
        $hasilUpdate = $conn->query($sql_updateReceiveName);
        if ($hasilUpdate) {
            //echo "Data telah tersimpan!";
        } else {
            //echo "Data gagal disimpan!";
        }
    }

    if ($FLAG_AMAN == 1) {
        echo "
                <script>
                setTimeout(function(){
                    window.location.href ='index.php?page=packaging';
                },500)
                </script>";
    }
    else if ($FLAG_AMAN == 2) {
        echo " <script>
                setTimeout(function(){
                    window.location.href ='index.php?page=additive';
                },500)
                </script>";
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
                 </button>
               <strong>Gagal!</strong>
              </div>';

    }

}

function tampilTombolTambahData() {
    if (strtolower((string) $_SESSION['role']) == "siteman") {
        echo '<a href="tambah_data.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
    }
}

function dataEditStatus(){

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
                                     <?php
                                     throwData();
//                                     print_r($_POST);
                                     ?>
                                </div>
                            </div>
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