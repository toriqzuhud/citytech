<?php 
    session_start();
    include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>City Tech</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo/logo.png" />
        <!-- Bootstrap icons-->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
        <link href="admin/dist/css/detail.css" rel="stylesheet" />

    </head>
    <body>
        <!-- Navigation-->
        <?php include 'navbar.php'; ?>

        
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">City Tech</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                if (isset($_GET['kategori'])) {
                  if ($_GET['kategori']=="headset"){
                    include 'kategori/headset.php';
                  }else if ($_GET['kategori']=="laptop"){
                    include 'kategori/laptop.php';
                  }else if ($_GET['kategori']=="router"){
                    include 'kategori/router.php';
                  }

                }else{
                   include 'kategori/allproduk.php';
                }
              ?>
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; <a href="index.php"><strong>City Tech</strong></a> 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
