<?php
    include "koenksi.php";

    $id  = $_GET['id'];

    $sql_perjalanan         = "DELETE FROM `perjalanan` WHERE id_perjalanan = '$id'";
    $eksekusi_perjalanan    = mysqli_query($conn,$sql_perjalanan);
    header("location:perjalanan.php");
?>