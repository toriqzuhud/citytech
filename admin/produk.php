<h2>Data Produk</h2>
	<div class="card-body px-0 pt-0 pb-2">
		<div class="table-responsive p-0">
			<table class="table align-items-center mb-0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Berat</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $nomor ?></td>
						<td><?php echo $pecah['nama_produk']; ?></td>
						<td><?php echo $pecah['kategori']; ?></td>
						<td><?php echo "Rp. ".number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $pecah['berat_produk']; ?></td>
						<td>
							<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
						</td>
						<td>
							<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'] ?>" class="btn-danger btn">Hapus</a>
							<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'] ?>" class="btn-warning btn">Ubah</a>

						</td>
					</tr>
				<?php $nomor++; ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>
