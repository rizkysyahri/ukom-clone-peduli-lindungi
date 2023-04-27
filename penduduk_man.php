<?php
    session_start();
    include "koneksi.php";

    if(!empty($_SESSION['stat_login'])){
        
    }
    // $tanggal  = date("Y-m-d");
    @$nik_login = $_SESSION['nik'];
    $nama_lengkap = $_SESSION['nama_login'];
    $tgl_lahir = $_SESSION['tgl_lahir'];
    $jabatan   = $_SESSION['jabatan'];
    $hari_ini = DATE("l, d F Y");

    $sql_penduduk       = "SELECT * FROM `penduduk`";
    $eksekusi_penduduk  = mysqli_query($conn,$sql_penduduk);

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
            <h5 class="text-primary"><i class='fa-solid fa-user-pen me-2'></i>Manajement Penduduk</h5>
                 <hr>

      
  <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-square-plus me-2"></i>Tambah Penduduk
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="text-primary fa-solid fa-square-plus me-2"></i>Form Tambah Perjalanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="tambah_data_penduduk.php" method="POST">
      <div class="modal-body">
      <div class="row">
            <div class="col">
            <i class="fa-solid fa-image-portrait me-2"></i>Nomor Induk Kewarganegaraan
                <input type="text" class="form-control mb-2" name="nik">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-file-signature me-2"></i>Nama Lengkap
                <input type="text" class="form-control mb-2" name="nama_lengkap">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-calendar-days me-2"></i>Tanggal Lahir
                <input type="date" class="form-control mb-2" name="tgl_lahir">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-envelope me-2"></i>Email
                <input type="email" class="form-control mb-2" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-phone me-2"></i>Nomor Telepon
                <input type="text" class="form-control mb-2" name="no_telp">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-angles-right me-2"></i>Tambahkan</button>
      </div>
      </form>
     
      
    </div>
  </div>
</div>

            <table class="table table-striped table-hover" id="example" style="width: 100%;">
              <thead>
                <tr>
                <th scope="col">No</th>
                  <th scope="col"><i class="fa-solid fa-id-card me-2"></i>NIK</th>
                  <th scope="col"><i class="fa-solid fa-user me-2"></i>Nama Lengkap</th>
                  <th scope="col"><i class="fa-solid fa-calendar-days me-2"></i>Tanggal Lahir</th>
                  <th scope="col"><i class="fa-solid fa-shield me-2"></i>Administrator</th>
                  <th scope="col"><i class="fa-solid fa-gears me-2"></i>Aksi</th>
                </tr>
              </thead>

              <?php
               $no=1;

                $sql_penduduk         = "SELECT * FROM penduduk ORDER BY `penduduk`.`nama_lengkap` ASC";
                $eksekusi_penduduk    = mysqli_query($conn,$sql_penduduk);
                while($data_penduduk = mysqli_fetch_array($eksekusi_penduduk))
               {
                $nik_login = $data_penduduk['nik'];
                $nama_login = $data_penduduk['nama_lengkap'];
                
                echo "<tr>";
                    
                    echo "<td>".$no."</td>";
                    echo "<td>".$data_penduduk['nik']."</td>";
                    echo  strtoupper("<td>".$data_penduduk['nama_lengkap']."</td>");
                    echo "<td>".$data_penduduk['tgl_lahir']."</td>";
                 
               echo "<td>";
               if($data_penduduk['jabatan'] == "penduduk")
               {
                    /* jadikan admin */
                    echo "<a href='admin_update.php?nik=".$data_penduduk['nik']."&jabatan=penduduk' class='btn btn-warning me-2'  onclick='return confirm(`Ubah Status?`)'><i class='fa-solid fa-user-shield me-2'></i>JADIKAN ADMIN</a>";
                    ?>
                    <?php
               }
              else
              {
                           /* batalkan admin */
                echo "<a href='admin_update.php?nik=".$data_penduduk['nik']."&jabatan=admin' class='btn btn-secondary me-2'  onclick='return confirm(`Ubah Status?`)'><i class='fa-solid fa-user-shield me-2'></i>BATALKAN ADMIN</a>";
              }
                       

               echo  "</td>";


               echo "<td>";
                /* perjalanan penduduk */
                echo "<a href='detail_penduduk.php?nik=$nik_login' class='btn btn-primary me-2'><i class='fa-solid fa-id-card'></i></a>";
                    
                /* hapus */
                echo "<a href='hapus_penduduk.php?nik=$nik_login' class='btn btn-danger'
                onclick='return confirm(`Apakah Ingin Anda Hapus?`)'><i class='fa-solid fa-trash-can'></i></a>";

                echo  "</td>";

                echo "</tr>";
                $no++;
               }

               
               ?>
            </table>
    </div>

         
    <?php
      include "footer.php";
    ?>

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