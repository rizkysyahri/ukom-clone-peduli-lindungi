<?php
    session_start();
    include "koneksi.php";

    if(!empty($_SESSION['stat_login'])){
            
    }
    $nik                            = $_GET['nik'];
    $sql_detail                      = "SELECT * FROM penduduk where nik = '$nik'";
    $eksekusi_detail                = mysqli_query($conn,$sql_detail);
    $data                           = mysqli_fetch_array($eksekusi_detail);
    // while($data = mysqli_fetch_array($eksekusi))
    // {
      
    //     $tgl_lahir = $_POST['tgl_lahir'] = $data = ['tgl_lahir'];
    //     $no_telp = $_POST['no_telp'] = $data = ['no_telp'];
    //     $email = $_POST['email'] = $data = ['email'];
    // }
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

    <title>Document</title>
    <style>
         body {
    /* background-color: #999999; */
    background-image: url(image/ist.jpg);
   }
        /* a{
            float:right;
           
        } */
        .container {
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div class="bg-white container border mt-3  p-3 shadow" style="width: 90%;">
   
        <h5 class="text-primary"><i class="fa-solid fa-id-card me-2"></i>Detail Penduduk</h5>
        <hr>
        <a href="penduduk_man.php" class="btn btn-danger" name=""><i class="fa-solid fa-right-from-bracket me-2"></i>kembali</a>

     
        <div class="bg-white pt-3 pb-3">
            <div class="row ms-3 me-3">
              
                <form>
                    <fieldset disabled>
                        <div class="row">
                            <div class="col-12">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?php echo $data['nama_lengkap']?>">
                            </div>
                            <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" value="<?php echo $data['tgl_lahir']?>">
                            </div>
                            <div class="col-md-6">
                            <label class="form-label">No Telepon</label>
                            <input type="text" class="form-control" value="<?php echo $data['no_telp']?>">
                            </div>
                            <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" value="<?php echo $data['email']?>">
                            </div>
                            <div class="col-md-6">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" value="<?php echo $data['jabatan']?>">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
    </div>
      
<hr>
      <h5 class="text-primary">Catatan Perjalanan | <?php echo ucwords($data['nama_lengkap'])?></h5>
      <hr>

      <table class="table table-striped table-hover" id="example">
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
                $no=1;
                // $nik_login              = $_SESSION['nik_login'];
                $sql         = "SELECT * FROM `perjalanan` where nik = '$nik' ORDER BY id_perjalanan desc";
                $eksekusi    = mysqli_query($conn,$sql);
                while($data_perjalanan = mysqli_fetch_array($eksekusi))
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
    
    <script>$(document).ready(function() {
      $('#example').DataTable();
  } );</script>
</body>
</html>