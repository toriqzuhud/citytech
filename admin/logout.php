<?php
	// $sesiadmin = $_SESSION["admin"];
	// session_destroy($sesiadmin);
	unset($_SESSION['admin']);
      echo "<script>location='login.php';</script>";
	
 ?>