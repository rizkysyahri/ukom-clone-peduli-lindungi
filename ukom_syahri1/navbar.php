<?php
  // session_start();
  include "koneksi.php";

  // if(!empty($_SESSION['stat_login'])) {

  // }
  //  $nik_login = $_SESSION['nik'];
  //   $nama_login = $_SESSION['nama_lengkap'];
  //   $tgl_lahir = $_SESSION['tgl_lahir'];
    $jabatan   = $_SESSION['jabatan'];

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand text-primary"><i class="text-danger fa-solid fa-house-chimney-medical me-2"></i>Peduli Masyarakat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="beranda.php"><i class="text-dark fa-solid fa-house-chimney-user me-2"></i>Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="perjalanan.php"><i class=" text-dark fa-regular fa-paper-plane me-2"></i>Catatan Perjalanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="histori_perjalanan.php"><i class=" text-dark fa-regular fa-hourglass me-2"></i>Histori Perjalanan</a>
              </li>

              <?php
                  if ($jabatan == 'admin') 
                   {
               echo   "<li class='nav-item dropdown'>";
                echo "<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                 <i class='fa-solid fa-shield me-2'></i>
                 Administrator</a>";

                echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                echo   "<li><a class='dropdown-item' href='penduduk_man.php'><i class='fa-solid fa-user-pen me-2'></i>Manajement Penduduk<a></li>";
                echo  "<li><a class='dropdown-item' href='list_administraror.php'><i class='fa-solid fa-user-shield me-2'></i>Daftar Administrator</a></li>";
                echo "</ul>";
                echo "</li>";
                  }
              ?>
              
      
              
             </ul>
                <div class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
                  <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle fw-bold rounded-pill" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user-tie me-2"></i><?php echo $_SESSION['nama_login']?>
                    </a>

                    <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-id-card-clip me-2"></i>Profile</a></li>
                      <li><a class="dropdown-item" href="form_login.php" type="logout"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>

                    </ul>
                  </div>
                  </ul>
             
            </div>
          </div>
        </div>
      </nav>
