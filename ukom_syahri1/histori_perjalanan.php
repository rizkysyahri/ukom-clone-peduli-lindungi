<?php
    session_start();
    include "koneksi.php";


    if(!empty($_SESSION['stat_login'])){

    }
    $nik              = $_SESSION['nik_login'];
    $nama_lengkap     = $_SESSION['nama_login'];      
    $tgl_lahir        = $_SESSION['tgl_lahir'];
    $jabatan        = $_SESSION['jabatan'];
    $hari_ini       = DATE("l, d F Y");
    $day            = date("D");{
        
    }

/*     tgl 1 - 2 */
@$tgl1  = $_POST['tgl1'];
@$tgl2  = $_POST['tgl2'];

if(!isset($tgl1)) {
    $sql = "SELECT * FROM perjalanan where nik = '$nik'";
}else{
    $sql = "SELECT * FROM perjalanan where nik = '$nik' and tanggal between '$tgl1' and '$tgl2'";
}
// $eksekusi       = mysqli_query($conn,$sql);
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
        /* width: 100%; */
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
            <h5 class="text-primary"><i class="fa-regular fa-hourglass me-2"></i>Histori Perjalanan |<span class="text-primary"> <?php echo $_SESSION['nama_login']?></span></h5>
            
            <hr>
            <div class="border mb-4 pt-3 pb-3">
            <form action="histori_perjalanan.php" method="POST">
            Perjalanan Dari Tanggal <input type="date" name="tgl1">
                Sampai <input type="date" name="tgl2">
                <button type="submit" class="btn btn-primary" name="">Cari</button>
            </form>
            </div>

            <table class="table table-striped table-hover" id="example" style="width: 100%;">
              <thead>
                <tr>
                <th scope="col">No  
                  <th scope="col"><i class="fa-solid fa-calendar-days me-2"></i>Tanggal Perjalanan</th>
                  <th scope="col"><i class="fa-solid fa-map-location-dot me-2"></i>Lokasi</th>
                  <th scope="col"><i class="fa-regular fa-clock me-2"></i>Waktu</th>
                  <th scope="col"><i class="fa-solid fa-temperature-high me-2"></i>Suhu Tubuh</th>
                </tr>
              </thead>
              <tbody>

              <?php
              $no = 1;
                // $sql_perjalanan         = "SELECT * FROM `perjalanan` inner join penduduk on perjalanan.nik = penduduk.nik
                //                         where perjalanan.nik = '$nik'";
                $eksekusi    = mysqli_query($conn,$sql);
                while($data_histori = mysqli_fetch_array($eksekusi))
               
    {

       echo  "<tr>";
       echo  "<td>".$no++."</td>";
        echo "<td>" .$data_histori['tanggal']."</td>";
        echo strtoupper("<td>" .$data_histori['lokasi']."</td>");
        echo "<td>" .$data_histori['waktu']."</td>";
        echo "<td>" .$data_histori['suhu_tubuh']."&#8451</td>";
        

        
    echo "</tr>";
    }

                ?>
                </tbody>
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