<?php 
      session_start();

      unset($_SESSION["pelanggan"]);
      echo "<script>location='index.php';</script>";
 ?>