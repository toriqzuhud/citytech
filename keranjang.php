<?php 
	session_start();
  include 'koneksi.php';

	// echo "<pre>";
	//  print_r($_SESSION);
	//  echo "</pre>";

  if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
    echo "<script> alert(' Keranjang Kosong ');</script>";
    echo "<script>location='index.php';</script>";
    // code...
  }
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
        <!-- <link href="admin/dist/css/cart.css" rel="stylesheet" /> -->
        <link href="admin/dist/css/detail.css" rel="stylesheet" />


 	<title></title>
 </head>
 <body>
   	        <!-- Navigation-->
          <?php include 'navbar.php'; ?>

    <section class="h-100" style="background-color: #ffff;">
      <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            </div>
              
              <?php $tampil=$koneksi->query("SELECT * FROM produk"); ?>
              <?php $nomor=1; ?>
            	<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>

            		<?php 
            			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            			$pecah = $ambil->fetch_assoc();
            			$subharga = $pecah["harga_produk"]*$jumlah;

                  

          // 				 echo "<pre>";
    					 // print_r($pecah);
    					 // echo "</pre>";
            		 ?>
            		
            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                  <div class="col-md-2 col-lg-2 col-xl-2">
                  	<!-- foto produk -->
                    <img
                      src="foto_produk/<?php echo $pecah['foto_produk']; ?>"
                      class="img-fluid rounded-3" alt="Cotton T-shirt">
                  </div>
                  <!-- nama produk dan harga produk -->
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2"><?php echo $pecah["nama_produk"]; ?></p>
                    <p><span class="text-muted"> RP. <?php echo number_format($pecah["harga_produk"]); ?></span></p>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <p class="lead fw-normal mb-2"><?php echo $jumlah; ?></p>

                    
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">RP. <?php echo number_format($subharga); ?></h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="text-danger"><i class="bi bi-trash"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <?php $nomor++; ?>
            <?php endforeach ?>

            <?php 
              $_SESSION['nomor'] = $nomor;
              $notif = $_SESSION['nomor'];
             ?>




            <!-- <div class="card mb-4">
              <div class="card-body p-4 d-flex flex-row">
                <div class="form-outline flex-fill">
                  <input type="text" id="form1" class="form-control form-control-lg" />
                  <label class="form-label" for="form1">Discound code</label>
                </div>
                <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
              </div>
            </div> -->

            <div class="card">
              <div class="card-body">
                <a href="checkout.php" class="btn btn-warning btn-block btn-lg" type="button">Checkout</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
 </body>
 </html>