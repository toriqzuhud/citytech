<?php
session_start();
include "koneksi.php";

// jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location = 'login.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./logo/logo.png">
    <title>Riwayat</title>
    <link href="admin/dist/css/invoice.css" rel="stylesheet" />

</head>

<body>
    <?php include "navbar.php"; ?>
    <br>
    <div class="container">
        <div class="row">
                    <!-- BEGIN INVOICE -->
            <div class="col-sm-12">
                <div class="grid invoice">
                    <div class="grid-body">
                        <div class="invoice-title">
                            <div class="row">
                                <h3>Riwayat Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?></h3>
                                <br>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="line">
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $nomor = 1;
                                    // mendapatkan id_pelanggan yang login dari session
                                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                                    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");
                                    while ($pecah = $ambil->fetch_assoc()) {
                                    ?>

                                        <tbody>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td><?= $pecah['tanggal_pembelian']; ?></td>
                                                <td>
                                                    <?= $pecah['status_pembelian']; ?>
                                                    <br>
                                                    <?php if (!empty($pecah['resi_pengiriman'])) : ?>
                                                        Resi: <?php echo $pecah['resi_pengiriman']; ?>
                                                    <?php endif ?>
                                                </td>
                                                <td>Rp. <?= number_format($pecah['total_pembelian']); ?></td>
                                                <td>
                                                    <a href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Nota</a>

                                                    <?php if ($pecah['status_pembelian'] == "Pending") : ?>
                                                        <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">Input Pembayaran</a>
                                                    <?php else : ?>
                                                        <a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php
                                        $nomor++;
                                    }
                                        ?>
                                        </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>