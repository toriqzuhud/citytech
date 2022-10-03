<?php 	
	session_start();
    include 'koneksi.php';




// jika tidak ada session lari ke login.php
    if (!isset($_SESSION["pelanggan"])) {
        echo "<script>location='login.php';</script>";
            }

    if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
            echo "<script> alert(' checkout Kosong ');</script>";
            echo "<script>location='index.php';</script>";
  }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="logo/logo.png" />
    <!-- Bootstrap icons-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- <link href="admin/assets/css/bootstrap.css" rel="stylesheet" /> -->
    <link href="admin/dist/css/invoice.css" rel="stylesheet" />

 	<title>Checkout</title>
 </head>
 <body>
 	  <!-- Navigation-->
        <?php include 'navbar.php'; ?>
        <!-- <pre>
        	<?php print_r($_SESSION["pelanggan"]); ?>
        </pre> -->
        <br>
        <div class="container">
                <div class="row">
                    <!-- BEGIN INVOICE -->
                    <div class="col-sm-12">
                        <div class="grid invoice">
                            <div class="grid-body">
                                <div class="invoice-title">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <img src="foto_produk/g2671.png" alt="" height="35">
                                            <strong>CITY TECH</strong>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2>Tagihan Pembayaran</h2>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <form method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <address>
                                            <strong>Dirikim Dari</strong><br>
                                            CITY TECH<br>
                                            Kec. Taktakan, Kota. Serang<br>
                                            Jl. Raya Cilegon No.Km. 5, Taman, Drangong<br>
                                            <abbr title="Phone">P :</abbr> +62-853-5283-0499
                                        </address>
                                    </div>

                                    <div class="col-sm-6 text-right">
                                        <address>
                                            <strong>Data dan Alamat Customer :</strong><br>
                                            <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?><br>
                                            <?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?><br>
                                            <textarea class="form-control" name="alamat_pengiriman" placeholder=" Alamat Pengiriman : Nama_Kota, Nama_Kecamatan, Nama_Desa, Alamat Lengkap, Kode POS "><?= $_SESSION['pelanggan']['alamat_pelanggan']; ?></textarea>
                                            
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <address>
                                            <strong>Metode Pembayaran :</strong><br>
                                            Bank <strong> BRI 4847-0101-4320-505 </strong> AN. <strong> TORIQ ZUHUD NURCAHYO </strong>
                                        </address>
                                    </div>
                                    <div class="col-sm-3 text-right">

                                    <!-- <form method="post"> -->
                                    <div>
                                        <strong> Jenis Pengiriman :</strong><br>
                                        <select class="form-control" name="id_ongkir">
                                        <!-- <option value="">Jenis Pengiriman</option> -->
                                        <?php 
                                            $ambil=$koneksi->query("SELECT * FROM ongkir");
                                            while($perongkir=$ambil->fetch_assoc()){
                                         ?>
                                         <option value="<?php echo $perongkir['id_ongkir'] ?>">
                                            <?php echo $perongkir['jenis_ongkir']; ?>- Rp.<?php echo number_format($perongkir['tarif']); ?>
                                         </option>
                                        <?php } $id_ongkir=$_POST["id_ongkir"];  ?>
                                        </select>
                                    </div>
                                    <!-- </form> -->
                                    
                                </div>
                                </div>
                                <!-- <form method="post"> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>ORDER SUMMARY</h3>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="line">
                                                    <td><strong>No</strong></td>
                                                    <td class="text-center"><strong>Produk</strong></td>
                                                    <td class="text-center"><strong>Harga</strong></td>
                                                    <td class="text-right"><strong>Jumlah</strong></td>
                                                    <td class="text-right"><strong>SUBTOTAL</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $nomor=1; ?>
                                                <?php $totalbelanja=0; ?>
                                                <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
                                                <?php 
                                                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                                                $pecah = $ambil->fetch_assoc();
                                                $subharga = $pecah["harga_produk"]*$jumlah;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?></td>
                                                    <td><strong><?php echo $pecah["nama_produk"]; ?></strong></td>
                                                    <td class="text-center">RP. <?php echo number_format($pecah["harga_produk"]); ?></td>
                                                    <td class="text-center"><?php echo $jumlah; ?></td>
                                                    <td class="text-right">RP. <?php echo number_format($subharga); ?></td>
                                                </tr>
                                                <?php $nomor++; ?>
                                                <?php $totalbelanja+=$subharga; ?>
                                                <?php endforeach ?>
                                            </tbody>
                                            <tfoot >
                                                <tr>
                                                    <th colspan="4">Total Pembayaran</th>
                                                    <th class="text-right">Rp. <?php echo number_format($totalbelanja); ?></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4"></th>
                                                    <th class="text-right"><button class="btn btn-primary" name="checkout">Chekout</button></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>                      
                                </div>
                                </form>
                                <?php
                                    if (isset($_POST["checkout"])) {
                                      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                                      
                                      $tanggal_pembelian = date("Y-m-d");
                                      $alamat_pengiriman = $_POST['alamat_pengiriman'];
                                      
                                      $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir");
                                      $arrayongkir = $ambil->fetch_assoc();
                                      $jenis_ongkir = $arrayongkir['jenis_ongkir'];
                                      $tarif = $arrayongkir['tarif'];

                                      $totalpembelian = $totalbelanja + $tarif;

                                      //menyimpan data ke tabel pembelian
                                      $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,jenis_ongkir,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$totalpembelian',
                                        '$jenis_ongkir','$tarif','$alamat_pengiriman') ");

                                      // mendapatkan id pembelian yg baru saja terjadi
                                      $id_pembelian_barusan = $koneksi->insert_id;

                                      foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {

                                        //mendapatkan data produk berdasarkan id produk
                                        // $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = 'id_produk'");
                                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                                        $perproduk = $ambil->fetch_assoc();

                                        $nama = $perproduk['nama_produk'];
                                        $harga= $perproduk['harga_produk'];
                                        $berat = $perproduk['berat_produk'];

                                        $subberat = $perproduk['berat_produk'] * $jumlah;
                                        $subharga = $perproduk['harga_produk'] * $jumlah;

                                          $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
                                      }

                                      //kosongankan keranjang
                                      unset($_SESSION['keranjang']);
                                      unset($_SESSION['nomor']);


                                      //tampilan lari ke hal nota
                                      echo "<script>alert('Pembelian Suskses');</script>";
                                      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";


                                    }
                                ?>


                            </div>
                        </div>
                    </div>
                    <!-- END INVOICE -->
                </div>      
        </div>
 
 </body>
 </html>