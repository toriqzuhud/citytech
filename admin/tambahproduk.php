<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" class="form-control" name="name">
	</div>
	<div class="form-group">
		<label>Harga</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<input type="text" class="form-control" name="laci">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

	if (isset($_POST['save'])) {
		$kategori = $_POST['kategori'];
		// $rp = $_POST[harga];
		// $abot = $_POST[berat];
		// $penjelasan = $_POST[deskripsi];
		$namafoto = $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasifoto, "../foto_produk/".$namafoto);
		mysqli_query($koneksi,"INSERT INTO `produk` (`nama_produk`,`harga_produk`,`berat_produk`,`foto_produk`, 
			`kategori`,`deskripsi_produk`) VALUES ('$_POST[name]','$_POST[harga]','$_POST[berat]','$namafoto',
			'$_POST[laci]','$_POST[deskripsi]')");

		echo "<div>Data Tersimpan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
	}
 ?>
 
 
