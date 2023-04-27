<?php
session_start();
    include "koneksi.php";

    $nik                = $_POST['nik'];
    $nama_lengkap       = $_POST['nama_lengkap'];
    $no_telp            = $_POST['no_telp'];
    $email              = $_POST['email'];
    $tgl_lahir          = $_POST['tgl_lahir'];
    $jabatan          = $_POST['jabatan'];
    
    $sql_req        = "INSERT INTO `penduduk` (`nik`, `nama_lengkap`, `no_telp`, `email`, `tgl_lahir`, `jabatan`) VALUES 
                        ('$nik', '$nama_lengkap', '$no_telp', '$email', '$tgl_lahir', '$jabatan')";
    $eksekusi_req   = mysqli_query($conn,$sql_req);
    if($eksekusi_req) {
        header("location:form_login.php");
    }
?>