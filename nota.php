<?php
    session_start();
    include 'koneksi.php';
    $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc()


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

 	<title>Invoice</title>
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
                                            <h2>INVOICE</h2>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <address>
                                            <strong>Dirikim Dari</strong><br>
                                            CITY TECH<br>
                                            Kec. Kragilan, Kab. Serang<br>
                                            Perum Graha Cisait B1 NO 6<br>
                                            <abbr title="Phone">P:</abbr> +62-853-5283-0499
                                        </address>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <address>
                                            <strong>Data dan Alamat Customer :</strong><br>
                                            <?php echo $detail['nama_pelanggan'] ?><br>
                                            <?php echo $detail['telepon_pelanggan']; ?><br>
                                            <?php echo $detail['alamat_pengiriman']; ?>

                                            
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <address>
                                            <strong>Metode Pembayaran :</strong><br>
                                            Bank <strong> BRI 4847-0101-4320-505 </strong> AN. <strong> TORIQ ZUHUD NURCAHYO </strong> <br>
                                            Silahkan Melakukan Pembayaran Senilai Rp. <?php echo number_format($detail["total_pembelian"]); ?><br>
                                            <br>
                                        </address>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                    <form method="post">
                                    <div>
                                        <strong> Detail Pembelian :</strong><br>
                                         <strong>No. Pembelian : <?php echo $detail['id_pembelian'] ?></strong><br>
                                         Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>

                                        
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
												<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
												<?php while($pecah=$ambil->fetch_assoc()){ ?>
                                                <tr>
                                                    <td><?php echo $nomor; ?></td>
                                                    <td><strong><?php echo $pecah['nama']; ?></strong></td>
                                                    <td class="text-center">RP. <?php echo number_format($pecah["harga"]); ?></td>
                                                    <td class="text-center"><?php echo $pecah['jumlah'];?></td>
                                                    <td class="text-right">RP. <?php echo number_format($pecah['subharga']*$pecah['jumlah']) ?></td>
                                                </tr>
                                                <?php $nomor++; ?>
												<?php }; ?>
                                            </tbody>
                                            <tfoot >
                                                <tr>
                                                    <th colspan="4">Total Pembelian</th>
                                                    <th class="text-right">Rp. <?php echo number_format($detail['total_pembelian']); ?></th>
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