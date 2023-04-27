<?php
    session_start();
    include "koneksi.php";

    if(!empty($_SESSION['stat_login'])){
            
    }
    @$nik                = $_SESSION['nik_login'];

    $sql                = "SELECT * FROM penduduk where nik = '$nik'";
    $eksekusi           = mysqli_query($conn,$sql);
    $data               = mysqli_fetch_array($eksekusi);
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

    <title>Document</title>
    <style>
          body {
    /* background-color: #999999; */
    background-image: url(image/ist.jpg);
   }
   .container {
       border-radius: 15px;
   }
        
        /* a{
            float:right;
           
        } */
    </style>
</head>
<body>
<div class="bg-white container border mt-3  p-3 shadow" style="width: 90%;">
   
        <h5 class="text-primary"><i class="fa-solid fa-id-card-clip me-2"></i>Profile</h5>
        <hr>
        <a href="perjalanan.php" class="btn btn-danger rounded-pill" name=""><i class="fa-solid fa-right-from-bracket me-2"></i>kembali</a>

        
       <!-- Button trigger modal -->
<button type="button" class=" btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-repeat me-2"></i>Ubah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="text-primary fa-solid fa-square-plus me-2"></i>Form Ubah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="ubah_data_profile.php" method="POST">
      <div class="modal-body">
      <div class="row">
            <div class="col">
            <i class="fa-solid fa-map-location-dot me-2"></i>Nomor Induk Kependudukan
            <input type="hidden" class="form-control mb-2" name="nik_lama" value="<?php echo $data['nik']?>" >
                <input type="text" class="form-control mb-2" name="nik" value="<?php echo $data['nik']?>" >
            </div>
        </div>
      <div class="row">
            <div class="col">
            <i class="fa-solid fa-map-location-dot me-2"></i>Nama Lengkap
                <input type="text" class="form-control mb-2" name="nama_lengkap" value="<?php echo $data['nama_lengkap']?>" >
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-calendar-days me-2"></i>Tanggal Lahir
                <input type="date" class="form-control mb-2" name="tgl_lahir" value="<?php echo $data['tgl_lahir']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-clock me-2"></i>No Telepon
                <input type="text" class="form-control mb-2" name="no_telp" value="<?php echo $data['no_telp']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-temperature-high me-2"></i>Email
                <input type="email" class="form-control mb-2" name="email" value="<?php echo $data['email']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <i class="fa-solid fa-temperature-high me-2"></i>Jabatan
                <input type="text" class="form-control mb-2" name="jabatan" value="<?php echo $data['jabatan']?>">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-angles-right me-2"></i>Ubah</button>
      </div>
      </form>
     
      
    </div>
  </div>
</div>


        <div class="bg-white pt-3 pb-3">
            <div class="row ms-3 me-3">
              
                <form>
                    <fieldset disabled>
                        <div class="row">
                            <div class="col-12">
                            <label class="form-label">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control" value="<?php echo $data['nik']?>">
                            </div>
                            <div class="col-md-6">
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
      </div>


    
      <?php include "footer.php";?>

    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/all.js"></script>
</body>
</html>