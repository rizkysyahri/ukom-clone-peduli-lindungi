<?php
    
    include "koneksi.php";

    $nik             = $_POST['nik'];
    $nama_lengkap    = $_POST['nama_lengkap'];
    $tgl_lahir       = $_POST['tgl_lahir'];
    $email           = $_POST['email'];
    $no_telp         = $_POST['no_telp'];
    $jabatan         = $_POST['jabatan'];
    

    $sql_data             = "INSERT INTO `penduduk` (`nik`, `nama_lengkap`, `tgl_lahir`, `email`, `no_telp`,  `jabatan`) VALUES
                             ('$nik', '$nama_lengkap', '$tgl_lahir', '$email', '$no_telp', 'penduduk')";
    $eksekusi_data        = mysqli_query($conn,$sql_data);
        header("location:penduduk_man.php");
?>