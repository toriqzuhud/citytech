<?php
include 'koneksi.php';

$keyword = $_GET['keyword'];

$semuadata = array();
$ambildata = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'");

while ($pecah = $ambildata->fetch_assoc()) {
    $semuadata[] = $pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h3>Hasil Pencarian: <?= $keyword ?></h3>

        <?php if (empty($semuadata)) : ?>
            <div class="alert alert-danger">Produk <strong><?= $keyword ?></strong> tidak di temukan</div>
        <?php endif ?>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php foreach ($semuadata as $key => $value) : ?>
                        <div class="col mb-5">
                            <div class="card h-100">

                                <!-- Product image-->
                                <img class="card-img-top" src="foto-produk/<?php echo $value['foto_produk']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $value['nama_produk']; ?></h5>
                                        <!-- Product price-->
                                        <?php echo number_format($value['harga_produk']) ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-dark mt-auto" href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">Beli</a>
                                        <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-outline-danger ">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </section>


    </div>
</body>

</html>