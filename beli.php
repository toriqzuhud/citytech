<?php 
	session_start();
	// cari id produk
	$id_produk = $_GET['id'];

	if (isset($_SESSION['keranjang'][$id_produk])) {
	 	$_SESSION['keranjang'][$id_produk]+=1;
	 } else{
	 	$_SESSION['keranjang'][$id_produk]=1;
	 }

	 // echo "<pre>";
	 // print_r($_SESSION);
	 // echo "</pre>";

	 echo "<script>alrert('Produk Telah Masuk Keranjang Belanja');</script>";
	 echo "<script>location='Keranjang.php';</script>";
 ?>
