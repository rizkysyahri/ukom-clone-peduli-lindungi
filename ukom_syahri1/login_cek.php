<?php
    session_start();
    include "koneksi.php";

    $nik          = $_POST['nik'];
    $tgl_lahir    = $_POST['tgl_lahir'];

    $sql_ver        = "SELECT * FROM penduduk where nik = '$nik' and tgl_lahir = '$tgl_lahir'";
    $eksekusi_ver   = mysqli_query($conn,$sql_ver);
    $ketemu         = mysqli_num_rows($eksekusi_ver);

    if($ketemu>0)
    {
        
        $data_pengguna = mysqli_fetch_array($eksekusi_ver);
        $_SESSION['stat_login'] = 1;
        $_SESSION['nama_login'] = $data_pengguna['nama_lengkap'];
        $_SESSION['nik_login'] = $data_pengguna['nik'];
        $_SESSION['tgl_lahir'] = $data_pengguna['tgl_lahir'];
        $_SESSION['jabatan'] = $data_pengguna['jabatan'];
        header("location:beranda.php");
       
    }
    else
    {
        header("location:form_login.php");
    }
        
    
?>