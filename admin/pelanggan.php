<div class="card-body px-0 pt-0 pb-2">
	<div class="table-responsive p-0">
		<h2>Data Pelanggan</h2>
			<table class="table align-items-center mb-0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Email</th>
						<th>Telepon</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $nomor ?></td>
						<td><?php echo $pecah['nama_pelanggan']; ?></td>
						<td><?php echo $pecah['email_pelanggan']; ?></td>
						<td><?php echo $pecah['telepon_pelanggan']; ?></td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>