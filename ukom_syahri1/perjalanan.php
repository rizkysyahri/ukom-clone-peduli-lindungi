<?php
    session_start();
    include "koneksi.php";

    if(!empty($_SESSION['stat_login'])){

    }
    // $tanggal  = date("Y-m-d");
    $jabatan   = $_SESSION['jabatan'];
    $hari_ini = DATE("l, d F Y");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
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
        .table-table-striped{
          overflow-y : scroll;
        }
        
    </style>
</head>
<body>
    
<?php
    include "navbar.php";
?>

       


        <div class="container border bg-light p-2" style="width: 90%;">
            <h5 class="text-primary"><i class=" fa-regular fa-paper-plane me-2"></i>Catatan Perjalanan</h5>
            <p><i class=" fa-solid fa-calendar-days me-2"></i>:
                 <span class="fw-bold">
                 <?php echo "$hari_ini"?></span></p>
                 <hr>

      
  <!-- Button trigger modal -->
<button type="button" class=" btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-square-plus me-2"></i>Tambah Perjalanan
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="text-primary fa-solid fa-square-plus me-2"></i>Form Tambah Perjalanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="perjalanan_tambah.php" method="POST">
      <div class="modal-body">
      <div class="row">
            <div class="col">
            <i class="fa-solid fa-map-location-dot me-2"></i>Lokasi
                <input type="text" class="form-control mb-2" name="lokasi">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-calendar-days me-2"></i>Tanggal
                <input type="date" class="form-control mb-2" name="tanggal">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-clock me-2"></i>Waktu
                <input type="time" class="form-control mb-2" name="waktu">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-temperature-high me-2"></i>Suhu Tubuh
                <input type="number" class="form-control mb-2" name="suhu_tubuh">
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
                  <th scope="col"><i class="fa-solid fa-map-location-dot me-2"></i>No</th>
                  <th scope="col"><i class="fa-solid fa-map-location-dot me-2"></i>Lokasi</th>
                  <!-- <th scope="col"><i class="fa-solid fa-calendar-days me-2"></i>Tanggal</th> -->
                  <th scope="col"><i class="fa-regular fa-clock me-2"></i>Waktu</th>
                  <th scope="col"> <i class="fa-solid fa-temperature-high me-2"></i>Suhu Tubuh</th>
                  <th scope="col"><i class="fa-solid fa-bars me-2"></i>Sistem Tubuh</th>
                  
                </tr>
              </thead>

              <?php
              $no= 1;
                $nik_login              = $_SESSION['nik_login'];
                $sql_perjalanan         = "SELECT * FROM `perjalanan` inner join penduduk on perjalanan.nik = penduduk.nik
                                        where perjalanan.nik = '$nik_login'";
                $eksekusi_perjalanan    = mysqli_query($conn,$sql_perjalanan);
                while($data_perjalanan = mysqli_fetch_array($eksekusi_perjalanan))
               {?>

                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $data_perjalanan['lokasi'];?></td>
                    
                    <td><?php echo $data_perjalanan['waktu'];?></td>
                    <td><?php echo $data_perjalanan['suhu_tubuh'];?>&#8451</td>
                    <td><button class="<?php if($data_perjalanan['suhu_tubuh'] > 37)

                    {
                        echo "btn btn-danger";
                    }
                    else
                    {
                        echo "btn btn-success";
                    }
                    
                    ?>"> <?php if($data_perjalanan['suhu_tubuh'] > 37)
                    
                    {
                        echo "SUHU TINGGI";
                    }
                    else
                    {
                        echo "SUHU NORMAL";
                    }

                    
                    ?></button></td>

                    
                </tr>

               <?php }?>

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
    <script type="text/javascript" src="js/datatables.min.js"></script>
    
    <script>$(document).ready(function() {
      $('#example').DataTable();
  } );</script>

</body>
</html>