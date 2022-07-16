<?php 
    session_start();
    include 'koneksi.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>City Tech</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo/logo.png" />
        <!-- Bootstrap icons-->
        <link href="logo/logo.png" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
     <title>LOGIN</title>
 </head>
 <body>
    <!-- Navigation-->
        <?php include 'navbar.php'; ?>

        <!-- header -->
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-sm-center h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
          <div class="text-center my-5">
            <img src="logo/logo.png" alt="logo" width="100"><h1>City Tech</h1>
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
                  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$_POST[user]' AND password_pelanggan = '$_POST[pass]'");
                  $cek=$ambil->num_rows;
                  if ($cek==1) {
                    $akunpelanggan = $ambil->fetch_assoc();
                    $_SESSION['pelanggan']=$akunpelanggan;
                    echo "<div class='swal.fire'>LOGIN SUKSES</div>";
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
                Don't have an account? <a href="daftar.php" class="text-dark">Create One</a>
              </div>
            </div>
          </div>
          <div class="text-center mt-5 text-muted">
            <strong>Copyright &copy; 2022 &mdash; <a href="index.php?halaman=semua">City Tech</a></strong>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/login.js"></script>
 
 </body>
 </html>