<?php 
    include 'koneksi.php';
  
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="admin/dist/css/adminlte.css" rel="stylesheet" />
  <!-- <link href="admin/dist/css/regis.css" rel="stylesheet" /> -->
	<title>Register</title>
</head>
<body>
	<!-- Navigation-->
    <?php include 'navbar.php'; ?>
	<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        	<div class="text-center my-5">
            <img src="logo/logo.png" alt="logo" width="100"><h1>City Tech</h1>
          </div>
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="post">

                <div class="form-outline mb-4">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" required>
                </div>

                <div class="form-outline mb-4">
                  <!-- <input type="text" id="form3Example4cdg" class="form-control form-control-lg" name="alamat" /> -->
                  <label class="form-label">Alamat</label>
                  <textarea class="form-control" name="alamat" required></textarea>

                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">No Telphone</label>
                  <input type="text" class="form-control form-control-lg" name="telepon" required>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-primary" name="regis">Daftar</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

              <?php 
                if (isset($_POST["regis"]))
                {

                $nama = $_POST["nama"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $alamat = $_POST["alamat"];
                $telepon = $_POST["telepon"];

                // cek email
                $ambil= $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
                $yangcocok = $ambil->num_rows;

                if ($yangcocok==1) {

                  echo "<script>alert('Pendaftaran Gagal, Email Telah Digunakan');</script>";
                  
                  echo "<script>location='daftar.php';</script>";


                }else{
                  // insert ke table pelanggan
                  $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan) 
                    VALUES ('$email',
                      '$password',
                      '$nama',
                      '$telepon',
                      '$alamat')");

                  echo "<script>alert('Pendaftaran Berhasil');</script>";
                  echo "<script>location='login.php';</script>";


                }}


               ?>

               
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


</body>
</html>