<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "fantasy";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
    h5 {
        text-transform: uppercase;
        color:#999999;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: blue;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
<body>
  <?php 
  session_start();

  if($_SESSION['level']==""){
    header("location:index.php");
  }

  ?>
  <?php
  if($_SESSION['level']=="admin"){
  ?>
  <h1 align="center">DASHBOARD ADMIN</h1>

  <p align="center"><a href="spp.php">SPP</a>
  <a href="kelas.php">KELAS</a> 
  <a href="petugas.php">PETUGAS</a> 
  <a href="siswa.php">SISWA</a> 
  <a href="transaksi.php">TRANSAKSI PEMBAYARAN</a> 
  <a href="laporan.php">LAPORAN</a>  
  <a href="logout.php">LOGOUT</a> </p>
<?php 
}

else if($_SESSION['level']=="petugas"){

   ?>
   <h1 align="center">DASHBOARD PETUGAS</h1>
    <div align="center"><a href="transaksi.php">TRANSAKSI PEMBAYARAN</a> 
      <a href="logout.php">LOGOUT</a> 
    </p>
      <?php
  }
  
  
  ?>
    </div>
</body>
</html>