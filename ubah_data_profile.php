<?php
   session_start();
   include "koneksi.php";

    $nik = $_SESSION['nik_login'];


    $nik1            = $_POST['nik'];  
    $nikLama = $_POST['nik_lama'];                                                                                                                                                                                                           
    $nama_lengkap    = $_POST['nama_lengkap'];                                                                                                                                                                                                             
    $no_telp         = $_POST['no_telp'];                                                                                                                                                                                                             
    $email           = $_POST['email'];                                                                                                                                                                                                             
    $jabatan         = $_POST['jabatan'];
    
    $sql            = "UPDATE `penduduk` SET `nik` = '$nik1' , `nama_lengkap` = '$nama_lengkap', `no_telp` = '$no_telp', `email` = '$email', `jabatan` = '$jabatan'
                        WHERE `penduduk`.`nik` = '$nikLama'";
    $eksekusi       = mysqli_query($conn,$sql);
    if($eksekusi)
    {
        echo "<script>
        
                alert('Profil Berhasil Diubah Klik Ok Untuk Login Kembali');
                document.location.href  = 'logout.php';
        </script>
        ";
        
    }else{
        echo "gagal update";
    }
?>