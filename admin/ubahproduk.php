<h2>Ubah Produk</h2>
<?php 
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

 ?>
 <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<input type="text" name="laci" class="form-control" value="<?php echo $pecah['kategori']; ?>">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Berat</label>
		<input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100px">
	</div>
	<div class="form-group">
		<label>Ubah Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
	if (isset($_POST['ubah'])) {
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		// jika dirubah
		if(!empty($lokasifoto)){
			// move_uploaded_file($lokasifoto,"../foto_produk/".$namafoto);
			move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");
			$koneksi->query(" UPDATE produk SET 
				`nama_produk`='$_POST[nama]',
				`harga_produk`='$_POST[harga]',
				`berat_produk`='$_POST[berat]',
				`foto_produk`= '$namafoto',
				`kategori`='$_POST[laci]',
				`deskripsi_produk`='$_POST[deskripsi]' 
				WHERE id_produk='$_GET[id]'");

			// mysqli_query($koneksi,"UPDATE `produk` (`nama_produk`,`harga_produk`,`berat_produk`,`foto_produk`,`deskripsi_produk`) VALUES ('$_POST[name]','$_POST[harga]','$_POST[berat]','$namafoto','$_POST[deskripsi]' WHERE id_produk='$_GET[id]')");

		}
		else{
			$koneksi->query(" UPDATE produk SET
				`nama_produk`='$_POST[nama]',
				`harga_produk`='$_POST[harga]',
				`berat_produk`='$_POST[berat]',
				`kategori`='$_POST[laci]',
				`deskripsi_produk`='$_POST[deskripsi]' 
				WHERE `id_produk`='$_GET[id]'");
		}
		echo "<script>alert('Data Produk Telah DIubah');</script>";
		echo "<script>location='index.php?halaman=produk'</script>";
	}
 ?>

