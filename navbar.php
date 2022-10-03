<?php

    // $notif = $_SESSION['nomor'];
    // $notif = $notif-1;

    if (empty($_SESSION['nomor']) OR !isset($_SESSION['nomor'])) {
        $notif = 0;
    }else{
        $notif = $_SESSION['nomor'];
        $notif = $notif-1;
    }
 ?>
<!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="admin/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
        <!-- <link href="admin/dist/css/adminlte.css" rel="stylesheet" /> -->
        <link href="admin/dist/css/detail.css" rel="stylesheet" />
<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img src="logo/logo.png" width="35px" style="margin-bottom: 5px;">City Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <?php if (isset($_SESSION["pelanggan"])):?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Logout</a></li>
                    <?php else: ?>
                      <li class="nav-item"><a class="nav-link active" aria-current="page" href="login.php">Login</a></li>

                      <li class="nav-item"><a class="nav-link active" aria-current="page" href="daftar.php">Daftar</a></li>
                    <?php endif ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
                        <li class="nav-item"><a class="nav-link" href="riwayat.php">Riwayat Belanja</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="./index.php?kategori=laptop">Laptop</a></li>
                                <li><a class="dropdown-item" href="./index.php?kategori=headset">Headset</a></li>
                                <li><a class="dropdown-item" href="./index.php?kategori=router">Router</a></li>
                            </ul>

                        </li>
                    </ul>
                    
                    <form class="d-flex" action="keranjang.php">
                        <button class="btn btn-outline-dark" type="submit">
                           <i class="bi-cart-fill me-1"> Cart </i>
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $notif; ?></span>
                        </button>
                    </form>
                    
                    
                </div>
            </div>
        </nav>