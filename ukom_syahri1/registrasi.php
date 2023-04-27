<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <title>Document</title>
</head>
<body>
<div class="bg-white container mt-3  p-3" style="width: 90%;">
   
   <h5 class="text-primary"><i class="fa-solid fa-user-plus me-2"></i>Daftar Baru</h5>
   <hr>
   <a href="form_login.php" class="btn btn-outline-danger rounded-pill" name=""><i class="fa-solid fa-right-from-bracket me-2"></i>kembali</a>
   <div class="bg-white pt-3 pb-3">
       <div class="row ms-3 me-3">
         
           <form action="input_penduduk.php" method="POST"> 
                   <div class="row">
                       <div class="col-12">
                       <label class="form-label"><i class="fa-solid fa-image-portrait me-2"></i>Nomor Induk Kependudukan</label>
                       <input type="text" class="form-control" placeholder="Masukkan NIK Anda" name="nik">
                       </div>
                       <div class="col-md-6">
                       <label class="form-label mt-2"><i class="fa-solid fa-file-signature me-2"></i>Nama Lengkap</label>
                       <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap Anda" name="nama_lengkap">
                       </div>
                       <div class="col-md-6">
                       <label class="form-label mt-2"><i class="fa-solid fa-phone me-2"></i>No Telepon</label>
                       <input type="text" class="form-control" placeholder="Masukan No Telepon Anda" name="no_telp">
                       </div>
                       <div class="col-md-6">
                       <label class="form-label mt-2"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                       <input type="email" class="form-control" placeholder="Masukan Email Anda" name="email">
                       </div>
                       <div class="col-md-6">
                       <label class="form-label mt-2"><i class="fa-solid fa-calendar-days me-2"></i>Tanggal Lahir</label>
                       <input type="date" class="form-control" name="tgl_lahir">
                       </div>
                       <div class="col-12">
                       <label class="form-label mt-2"><i class='fa-solid fa-shield me-2'></i>Jabatan</label>
                       <input type="text" class="form-control" placeholder="Masukan Jabatan Anda " name="jabatan">
                       </div>
                   </div>
                   <button type="submit" class="btn btn-primary mt-3">Daftar</button>
           </form>
       </div>
   </div>
 </div>
 <script src="js/bootstrap.bundle.js"></script>
 <script src="js/all.js"></script>
</body>
</html>