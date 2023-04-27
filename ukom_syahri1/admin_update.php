<?php
    include "koneksi.php";

    $nik        = $_GET['nik'];
    $jabatan    = $_GET['jabatan'];

    if($jabatan == 'penduduk')
    {
        $jabatan = 'admin';
    }
    else{
        $jabatan = 'penduduk';
    }
    $sql_update         = "UPDATE `penduduk` SET `jabatan` = '$jabatan' WHERE `penduduk`.`nik` = '$nik'";
    $eksekusi_update    = mysqli_query($conn,$sql_update);
    header("location:penduduk_man.php");
?>
 
            