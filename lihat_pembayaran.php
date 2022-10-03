<?php
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian
WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detbay);
// echo "</pre>";

// jika belum ada data pembayaran
if (empty($detbay)) {
    echo "<script>alert('belum ada data pembayaran')</script>";
    echo "<script>location = 'riwayat.php'</script>";
}

// jika data pelanggan yang bayar tidak sesuai dengan yang login
if ($_SESSION['pelanggan']['id_pelanggan'] !== $detbay['id_pelanggan']) {
    echo "<script>alert('anda tidak berhak melihat pembayaran orang lain')</script>";
    echo "<script>location = 'riwayat.php'</script>";
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pembayaran</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <br>
    <div class="container">
        <h3>Lihat Pembayaran</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td><?= $detbay['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?= $detbay['bank'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $detbay['tanggal'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?= number_format($detbay['jumlah']); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="bukti-pembayaran/<?= $detbay['bukti'] ?>" alt="" class="img-responsive" width="500px">
            </div>
        </div>
    </div>
</body>

</html>