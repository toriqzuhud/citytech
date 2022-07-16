<?php
session_start();
$koneksi= new mysqli("localhost","root","","toko_kel2");
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>
<body>
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
            <img src="../logo/logo.png" alt="logo" width="100">
          </div>
          <div class="card shadow-lg">
            <div class="card-body p-5">
<!--               <h1 class="fs-4 card-title fw-bold mb-4">Login</h1><br> -->
              <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3">
                  <label class="mb-2 text-muted=" for="email">E-Mail Address</label>
                  <input id="email" type="email" class="form-control" name="user" value="" required autofocus>
                  <div class="invalid-feedback">
                    Email is invalid
                  </div>
                </div>

                <div class="mb-3">
                  <div class="mb-2 w-100">
                    <label class="text-muted" for="password">Password</label>
                    <!-- <a href="forgot.html" class="float-end">
                      Forgot Password?
                    </a> -->
                  </div>
                  <input id="password" type="password" class="form-control" name="pass" required>
                    <div class="invalid-feedback">
                      Password is required
                    </div>
                </div>

                <div class="d-flex align-items-center">
                  <!-- <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember Me</label><br>
                  </div><br> -->
                  <button class="btn btn-primary" name="login">
                    Login
                  </button>
                </div>
              </form>
              <?php 
                if (isset($_POST['login'])) {
                  $ambil = $koneksi->query("SELECT * FROM admin WHERE username = '$_POST[user]' AND password = '$_POST[pass]'");
                  $cek=$ambil->num_rows;
                  if ($cek==1) {
                    $akun = $ambil->fetch_assoc();
                    $_SESSION['admin']= $akun;
                    // echo "<div class='alert alert-info'>LOGIN SUKSES</div>";
                    echo "<script>swal.fire('LOGIN SUKSES','success);</script>";

                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                  }else{
                    echo "<div class='alert alert-danger'>LOGIN GAGAL</div>";
                    echo "<meta http-equiv='refresh' content='1;url=login.php'>"; 
                  }
                } 
               ?>

              </div>
            <div class="card-footer py-3 border-0">
              <div class="text-center">
                Don't have an account? <a href="register.html" class="text-dark">Create One</a>
              </div>
            </div>
          </div>
          <div class="text-center mt-5 text-muted">
            <strong>Copyright &copy; 2022 &mdash; <a href="index.php">City Tech</a></strong>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/login.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  


</body>
</html>