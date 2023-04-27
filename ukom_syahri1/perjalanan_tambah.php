<?php
    session_start();
    include "koneksi.php";

    $nik            = $_SESSION['nik_login'];
    $lokasi         = $_POST['lokasi'];
    $tanggal        = $_POST['tanggal'];
    $waktu          = $_POST['waktu'];
    $suhu_tubuh     = $_POST['suhu_tubuh'];

    $sql_per        = "INSERT INTO `perjalanan` VALUES 
                        (NULL, '$lokasi', '$tanggal', '$waktu', '$suhu_tubuh', '$nik')";
    $eksekusi_per  = mysqli_query($conn,$sql_per);

    if($eksekusi_per)
    {
        header("location:perjalanan.php");
    }
    else
    {
        header("location:form_login.php");
    }
?>  