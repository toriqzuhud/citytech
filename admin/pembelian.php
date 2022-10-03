<h2>Data Pembelian</h2>
<div class="card-body px-0 pt-0 pb-2">
<div class="table-responsive p-0">
<table class="table align-items-center mb-0">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT DISTINCT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan order by id_pembelian desc"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
			<td><?= "RP. ".number_format($pecah['total_pembelian']) ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>
				<?php if ($pecah['status_pembelian'] !== "Pending") : ?>
                        <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
                <?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>
</div>
</div>