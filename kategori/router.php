<?php 
    // session_start();
    include 'koneksi.php';
    $ambil=$koneksi->query("SELECT * FROM produk WHERE kategori = 'Router'"); 

?>
                    <?php while($perproduk = $ambil->fetch_assoc()){ ?>
                    <div class="col mb-5">
                        <div class="thumbnail">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
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
                                    <span class="text-muted text-decoration-line-through"></span>
                                   Rp. <?php echo number_format($perproduk['harga_produk']); ?>
                                </div>
                            </div>
                            
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>