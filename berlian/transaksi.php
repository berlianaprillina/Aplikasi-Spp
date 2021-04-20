<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      tr {
        text-transform: uppercase;
        color:black;
      }
    h2 {
        text-transform: uppercase;
        color: black;
      }
    h3 {
        text-transform: uppercase;
        color: black;
      }
       label {
        text-transform: uppercase;
        color: black;
      }
    th {
        text-transform: uppercase;
        color:#999999;
      }
      td {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: blue;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: blue;
    }
    div {
      text-transform: uppercase;
        color:#999999;
    }
 
  
    </style>
  </head>
<body>

<?php 
include 'koneksi.php';
include 'header.php';
 ?>

       <div class="container">
  <div class="page-header">
<center><h2>CARI SISWA BERDASARKAN NISN</h2>
  </div>
 <form action="" method="get">
  <table class="table">
    <tr>
      <td>NISN </td>

      <td>:</td>
      <td>
        <input class="form-control" type="text" name="nisn">
      </td>
      <td>
        <button class="btn btn-success" type="submit" name="cari">Cari</button>
      </td>
    </tr>
  </table>
 </form>


<?php 
if (isset($_GET['nisn']) && $_GET['nisn'] != ''){
  $data = $koneksi->query("SELECT * FROM siswa WHERE nisn = '$_GET[nisn]'");
  $data = mysqli_fetch_assoc($data);
  $nisn = $data['nisn'];

?>
<div class="panel panel-info">
  <div class="panel-heading">
<center><h3>Biodata siswa</h3>
</div>
<div class="panel panel-body">
  <table class="table table-bordered table-striped">
    <tr>
      <td>NISN</td>
      <td><?=$data['nisn'] ?></td>
    </tr>
    <tr>
      <td>NIS</td>
      <td><?= $data['nis'] ?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><?= $data['nama'] ?></td>
    </tr>
    <tr>
      <td>ID Kelas</td>
      <td><?= $data['id_kelas'] ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?= $data['alamat'] ?></td>
    </tr>
    <tr>
      <td>No Telepon</td>
      <td><?= $data['no_telp'] ?></td>
    </tr>
    <tr>
      <td>ID SPP</td>
      <td><?= $data['id_spp'] ?></td>
    </tr>
  </table>
</div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
<center><h3>Tagihan SPP Siswa</h3>
</div>
<div class="panel-body ">
  <table class="table table-bordered table-striped">
<tr>
  <th>NO</th>
  <th>ID Pembayaran</th>
  <th>ID Petugas</th>
  <th>NISN</th>
  <th>Tanggal Bayar</th>
  <th>Bulan Bayar</th>
  <th>Tahun Bayar</th>
  <th>ID SPP</th>
  <th>Jumlah Bayar</th>
  <th>Bayar</th>
</tr>
<?php 
$sql= mysqli_query($koneksi ," SELECT * FROM pembayaran WHERE nisn = '$data[nisn]' ORDER BY jumlah_bayar ASC ");
$i=1;
while($sq= mysqli_fetch_assoc($sql)){
  echo "

    <tr>
      <td>$i</td>
      <td>$sq[id_pembayaran]</td>
      <td>$sq[id_petugas]</td>
      <td>$sq[nisn]</td>
      <td>$sq[tgl_bayar]</td>
      <td>$sq[bulan_dibayar]</td>
      <td>$sq[tahun_dibayar]</td>
      <td>$sq[id_spp]</td>
      <td>$sq[jumlah_bayar]</td>
      
      <td align='center'";
        if ($sq['id_pembayaran'] == ''){
          echo "<a href='proses_transaksi.php?nisn=$nisn&act=bayar&id=$sq[id_pembayaran]'></a> ";
          echo "<a class='btn btn-primary btn-sm' href='cetak_slip_transaksi.php?nisn=$nisn&act=bayar&id=$sq[id_pembayaran]>Bayar</a> ";
        }else {
          echo "</a>";
          echo "<a class='btn btn-danger btn-sm' href='proses_transaksi.php?nisn=$nisn&act=batal&id=$sq[id_pembayaran]'>Batal</a> ";
          echo "<a class='btn btn-success btn-sm' href='cetak_slip_transaksi.php?nisn=$nisn&act=bayar&id=$sq[id_pembayaran]' target='_blank'>Cetak</a> ";
          
        }
      echo "</td>
    </tr>

    ";
    $i++;
}
 ?>
</table>
</div>
</div>
<?php 
}
?>