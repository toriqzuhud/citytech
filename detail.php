<?php 
	session_start();
    include 'koneksi.php';



	//dapatkan id produk dari url
	$id_produk = $_GET["id"];

	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
	$detail = $ambil->fetch_assoc();

 ?>

 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> City Tech - <?php echo $detail["nama_produk"]; ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="logo/logo.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
        <link href="admin/dist/css/detail.css" rel="stylesheet" />

    </head>
    <body>
        <!-- Navigation-->
        <?php include 'navbar.php'; ?>
        <!-- Product section-->

        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $detail["nama_produk"]; ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="">Rp. <?php echo number_format($detail["harga_produk"]); ?></span>
                        </div>
                        <p class="lead"><?php echo $detail["deskripsi_produk"]; ?></p>
                        <form method="post">
	                        <div class="d-flex">
	                            <input name="jumlah" class="form-control text-center me-3"  id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
	                            <button class="btn btn-outline-dark flex-shrink-0" name="beli">
	                                <i class="bi-cart-fill me-1"></i>
	                                Add to cart
	                            </button>
	                        </div>
	                    </form>
                        <?php 
                        	if (isset($_POST["beli"])) 
                        		{
                        		// code...
                        		$jumlah = $_POST['jumlah'];

                        		// masuk ke keranjang
                        		$_SESSION["keranjang"][$id_produk] = $jumlah;

                        		echo "<script>alert('Produk Telah Masuk Ke Keranjang');</script>";
                        		echo "<script>location='keranjang.php';</script>";
                        	}

                         ?>
                         
                         
                    </div>
                </div>
            </div>
        </section>
        </div>
        </div>
        </div>
    </div>
</div>
    
    <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Other products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php $test=$koneksi->query("SELECT * FROM produk LIMIT 4"); ?>
                    <?php while($perproduk = $test->fetch_assoc()){ ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>"><img class="card-img-top" src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="..." /></a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $perproduk['nama_produk']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    Rp. <?php echo number_format($perproduk['harga_produk']); ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
