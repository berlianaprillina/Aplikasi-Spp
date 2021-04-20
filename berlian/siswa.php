<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
	   h2 {
        text-transform: uppercase;
        color: black;
      }
	  h3 {
        text-transform: uppercase;
        color: black;
      }
	  h4 {
        text-transform: uppercase;
        color:#999999;
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

  include ('header.php');
?>
    <center><h2>Data Siswa</h2><center>
    <center><a href="tambah_siswa.php">+ &nbsp; Tambah siswa</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>nisn</th>
          <th>nis</th>
          <th>nama</th>
          <th>nama_kelas</th>
          <th>alamat</th>
          <th>no_telp</th>
          <th>tahun</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN spp ON siswa.id_spp=spp.id_spp ORDER BY nama ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      $no = 1; 
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nisn']; ?></td>
          <td><?php echo $row['nis']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['nama_kelas']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['no_telp']; ?></td>
          <td><?php echo $row['tahun']; ?></td>

          <td>
              <a href="edit_siswa.php?id=<?php echo $row['nisn']; ?>">Edit</a> |
              <a href="proses_hapussiswa.php?id=<?php echo $row['nisn']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
</body>
</html>