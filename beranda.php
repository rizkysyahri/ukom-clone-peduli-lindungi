<?php
  session_start();
  include "koneksi.php";

  if(!empty($_SESSION['stat_login'])){

  }
  $nik              = $_SESSION['nik_login'];
  // $tgl_lahir        = $_SESSION['tgl_lahir'];
  $jabatan        = $_SESSION['jabatan'];
  // $tanggal        = date("l F Y");
  $hari_ini       = DATE("l, d F Y");

  // /* jumlah terakhir */
  // $sql_jum_lok            ="SELECT * FROM perjalanan WHERE nik = '$nik'";
  // $eksekusi_jum_lok       = mysqli_query($conn,$sql_jum_lok);
  // $sql_jum_lok            = mysqli_num_rows($eksekusi_jum_lok);

/* //  suhu tubuh terakhir */
  $sql_suhu         = "SELECT * FROM `perjalanan` WHERE nik = '$nik' ORDER BY id_perjalanan DESC";
  $eksekusi_suhu    = mysqli_query($conn,$sql_suhu);
  $data_suhu        = mysqli_fetch_array($eksekusi_suhu);
  $suhu_terkini     = $data_suhu['suhu_tubuh'];
  if(empty($suhu_terkini)){
    $suhu_terkini = 0;
  }
    
 /*  lokasi terkini */
  @$lokasi_terkini    = $data_suhu['lokasi'];
  if(empty($lokasi_terkini)){
   $lokasi_terkini  = 0;
  }
  
/*    jumlah perjalanan  */
$sql_jum_per                = "SELECT * FROM perjalanan where nik = '$nik'";
$eksekusi_jum_per           = mysqli_query($conn,$sql_jum_per);
$jum_per                    = mysqli_num_rows($eksekusi_jum_per);
 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet"  href="css/styleku.css">
  <title>Document</title>

  <style>
   body {
    /* background-color: #999999; */
    background-image: url(image/ist.jpg);
   }

  
      .container {
        /* width: 100%; */
        box-shadow: 2px 3px 3px 3px grey; 
        border-radius: 15px;
        margin-top: 100px;
      }
      .row {
        margin: auto; 
        margin-left: 55px;
        
      }
      footer {
    background-color: rgba(0, 0, 0, 0.2);
}
     
  </style>  
</head>
<body>
  
        <?php
            include "navbar.php";
        ?>

    <div class="container border bg-light p-2" style="width: 90%;">
            <h5 class="text-primary"><i class="fa-solid fa-house-chimney-user me-2"></i>Beranda</h5>
              <p><i class=" fa-solid fa-calendar-days me-2"></i>:<span class="fw-bold"> <?php echo $hari_ini?></span></p>
            <hr>
            <div class="border text-center mb-4 pt-5 pb-5">
               <p>Selamat Datang <b> <?php echo $_SESSION['nama_login']?> </b></p>
               <p>Anda Masuk menggunakan akun <b><?php echo $_SESSION['jabatan']?></b></p>
            </div>
    

            <div class="row ms-4 mb-3">
    <div class="row text-dark">
        <div class="card me-5 shadow" style="width: 20rem;">
           <div class="card-body">
             <div class="card-body-icon text-success p-4">
              <i class="fa-solid fa-map-location-dot me-2"></i>
             </div>
             <h4 class="card-title">LOKASI TERKINI</h4>
             <hr>
             <div class="display"><?php echo "$lokasi_terkini";?></div>
             <a ><p class="card-text text-dark mt-3">Ini Lokasi Anda</p></a>
           </div>
         </div>

         <div class="card me-5 shadow" style="width: 20rem;">
          <div class="card-body">
            <div class="card-body-icon text-danger p-4 ">
            <i class="fa-solid fa-temperature-high me-2"></i>
            </div>
            <h4 class="card-title">SUHU TERKINI</h4>
            <hr>
            <div class="display-4"><?php echo "$suhu_terkini";?>&#8451</div>
            <a ><p class="card-text text-dark mt-3">Ini Suhu Anda</p></a>
          </div>
        </div>

        <div class="card me-5 shadow" style="width: 20rem;">
          <div class="card-body">
            <div class="card-body-icon text-info p-4">
            <i class="fa-regular fa-paper-plane me-2"></i>
            </div>
            <h4 class="card-title">JUMLAH PERJALANAN</h4>
            <hr>
            <div class="display-4"><?php echo "$jum_per";?></div>
            <a ><p class="card-text text-dark mt-3">Perjalanan Anda</p></a>
          </div>
        </div>
        </div>
  </div>
  </div>
         
  <?php 
    include "footer.php";
  ?>

    <script text="text/javascript" src="js/bootstrap.bundle.js"></script>
    <script text="text/javascript" src="js/all.js"></script>
    

</body>
</html>


  