<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['id'])) {
  include "login.php";
 }else{
 $sqluser = $conn->query("SELECT*FROM tb_user WHERE id='$_SESSION[id]'");
 $resultuser = $sqluser->fetch(PDO::FETCH_ASSOC);


 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <?php
  if (isset($_GET['page'])) {
  ?>
<div class="container mt-3">
  <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/apl_antrians">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=tarif">Data Tarif</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=pelanggan">Data Client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=user">Data User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=bayar">Data Paymenst</a>
        </li>
      </ul>
    </div>
</nav>
</div>


  <?php
}
      $page = isset($_GET['page'])?$_GET['page']:null;
      if (isset($page)) {
          
          if ($page=='daftar') {
            include"daftar_antrian.php";
          }
          if ($page=='tambah') {
            include"tambah_antrian.php";
          }
        }else{
           include"default.php";
        }
      
      ?>
</body>
</html>
<?php
}
?>