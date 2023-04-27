<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <title>login</title>
    <style>
        body {
            background-image: url(image/ng.jpg);
        }
        .container {
            border-radius: 20px;
            
        }
    </style>
</head>
<body class="bg-secondary">
    
    <nav class="navbar navbar-expand-lg bg-light shadow">
        <div class="container">
            <a class="navbar-brand text-primary"><i class="text-danger fa-solid fa-house-chimney-medical me-2"></i>PeduliMasyarakat</a>
        </div>
    </nav>

    <div class="container border bg-light mt-5 p-2 shadow" style="width: 35%;">
    <div class="content"></div>
        <form action="login_cek.php" method="POST">
            <h5 class="text-primary"><i class="text-dark fa-solid fa-chalkboard-user me-2"></i>LOGIN</h5>
            <hr>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-image-portrait me-2"></i>Nomor Induk Kependudukan</label>
                  <input type="text" class="form-control"  name="nik">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-calendar-days me-2"></i>Tanggal Lahir</label>
                  <input type="date" class="form-control"  name="tgl_lahir">
                </div>
                
                <button type="submit" class="btn btn-primary rounded-pill mt-2" style="width: 100%;"><i class="fa-solid fa-right-to-bracket me-2"></i>Masuk</button>
                <br>
                <!-- Button trigger modal -->
                    <a href="registrasi.php" class="btn btn-success rounded-pill mt-2" style="width:100%;" name="">
                    <i class="fa-solid fa-user-plus me-2"></i>Daftar Baru
                    </a>
        </form>
    </div>

    <?php
        // include "footer.php";
    ?>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/all.js"></script>
</body>
</html>