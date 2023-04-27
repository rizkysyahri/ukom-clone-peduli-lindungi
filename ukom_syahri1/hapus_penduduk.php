<?php
include "koneksi.php";

    $nik_login      = $_GET['nik'];

    $sql            = "DELETE FROM `penduduk` WHERE `penduduk`.`nik` = '$nik_login'";
    $eksekusi       = mysqli_query($conn,$sql);

    // if ($eksekusi)
    // {
        header("location:penduduk_man.php");
    // }else{
    //     echo "gagal";
    // }

?>