<h2>Selamat Datang </h2>
<br>
<?php
	// hitung jumlah pelanggan
	$ambil=$koneksi->query("SELECT COUNT(id_pelanggan) AS jmlplg FROM pelanggan");
	$pecah = $ambil->fetch_assoc();

	//hitung jumlah pembelian
	$a=$koneksi->query("SELECT COUNT(id_pembelian) AS jmlpmbl FROM pembelian");
	$p = $a->fetch_assoc();

	//hitung jumlah produk
    $produk=$koneksi->query("SELECT COUNT(id_produk) AS jmlprd FROM produk");
	$pr = $produk->fetch_assoc();
    
   
    $pending=$koneksi->query("SELECT COUNT(id_pembelian) AS jmlpmbl, COUNT(status_pembelian) AS jmlpending FROM pembelian WHERE status_pembelian = 'Sudah Kirim Pembayaran' ");
	$print = $pending->fetch_assoc();

    

 ?>

		
              
               
 		<div class="row">
         <div class="col-xl-3 col-sm- mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pelanggan</p>
                    <h5 class="font-weight-bolder">
                      		<?php echo $pecah['jmlplg']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Pembelian</p>
                    <h5 class="font-weight-bolder">
                      <?php echo $p['jmlpmbl']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Produk</p>
                    <h5 class="font-weight-bolder">
                      <?php echo $pr['jmlprd']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fa fa-cube text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-3 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sudah Kirim Pembayaran</p>
                    <h5 class="font-weight-bolder">
                      <?php echo $print['jmlpending']; ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fa fa-cube text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>		