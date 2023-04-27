<?php
    session_start();
    include "koneksi.php";

    if(!empty($_SESSION['stat_login'])){
        
    }
    // $tanggal  = date("Y-m-d");
    // $nik_login = $_SESSION['nik'];
    // $nama_login = $_SESSION['nama_lengkap'];
    // $tgl_lahir = $_SESSION['tgl_lahir'];
    // $jabatan   = $_SESSION['jabatan'];
    // $hari_ini = DATE("l, d F Y");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="css/styleku.css">
    <title>Document</title>
    <style>
        body {
          background-image: url(image/ist.jpg);
        }
        .container {
        width: 100%;
        box-shadow: 2px 3px 3px 3px grey; 
        border-radius: 15px;
        margin-top: 100px;
        }
        
    </style>
</head>
<body>
    
<?php
    include "navbar.php";
?>

       


        <div class="container border bg-light p-2" style="width: 90%;">
            <h5 class="text-primary"><i class='fa-solid fa-user-pen me-2'></i>List Administrator</h5>
                 <hr>

 
            <table class="table table-striped table-hover" id="example" style="width: 100%;">
              <thead>
                <tr>
                <th scope="col">No</th>
                  <th scope="col"><i class="fa-solid fa-id-card me-2"></i>NIK</th>
                  <th scope="col"><i class="fa-solid fa-user me-2"></i>Nama Lengkap</th>
                  <th scope="col"><i class="fa-solid fa-calendar-days me-2"></i>Tanggal Lahir</th>
                </tr>
              </thead>

              <?php
               $no=1;

                $sql_penduduk         = "SELECT * FROM penduduk where jabatan = 'admin'";
                $eksekusi_penduduk    = mysqli_query($conn,$sql_penduduk);
                while($data_penduduk = mysqli_fetch_array($eksekusi_penduduk))
               {
                $nik_login = $data_penduduk['nik'];
                $nama_login = $data_penduduk['nama_lengkap'];

                echo "<tr>";
                    
                    echo "<td>".$no."</td>";
                    echo "<td>".$data_penduduk['nik']."</td>";
                    echo ucwords ("<td>".$data_penduduk['nama_lengkap']."</td>");
                    echo "<td>".$data_penduduk['tgl_lahir']."</td>";
                
                echo "</tr>";
                $no++;
               }

                ?>

            </table>
    </div>

         
   

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/all.js"></script>

    <!-- datatables -->
    <script text="text/javascript" src="js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/datatables.js"></script>
    
    <script>$(document).ready(function() {
      $('#example').DataTable();
  } );</script>

</body>
</html>