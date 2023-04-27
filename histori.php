<?php 
    session_start();
    include "koneksi.php";

    $nik = $_SESSION['nik_login'];
    $tgl_1  = $_POST['tgl_1'];
    $tgl_2  = $_POST['tgl_2'];

    $sql         = "SELECT * FROM perjalanan INNER JOIN penduduk on perjalanan.nik = penduduk.nik where
                              (perjalanan.nik = $nik and (tanggal between '$tgl11' and '$tgl2'))";
    $eksekusi    = mysqli_query($conn,$sql_perjalanan);
    header("location:histori_perjalanan.php");
?>