<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location = 'login.php';</script>";
    exit();
}

// mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yang beli
$id_pelanggan_yang_beli = $detpem['id_pelanggan'];
// mendapatkan id_pelanggan yang login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if ($id_pelanggan_login !== $id_pelanggan_yang_beli) {
    echo "<script>alert('Dilarang melihat data orang lain!!!');</script>";
    echo "<script>location = 'riwayat.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <br>
    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <p>kirim bukti pembayaran anda disini</p>
        <div class="alert alert-info">total tagihan anda <strong>Rp. <?php echo number_format($detpem['total_pembelian']); ?></strong></div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti" min="1">
                <p class="text-danger">Foro bukti harus JPG maksimal 2MB</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <?php
    // jika ada tombol kirim
    if (isset($_POST["kirim"])) {
        // upload dulu foto bukti
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis") . $namabukti;
        move_uploaded_file($lokasibukti, "bukti-pembayaran/$namafiks");

        $nama = $_POST['nama'];
        $bank = $_POST['bank'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date("Y-m-d");

        // simpan pembayaran
        $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti)
        VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

        // update data pembelian nya dari pending menjadi sudah kirim pembayaran
        $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Kirim Pembayaran'
        WHERE id_pembelian='$idpem'");
        echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran');</script>";
        echo "<script>location = 'riwayat.php';</script>";
    }
    ?>
</body>

</html>