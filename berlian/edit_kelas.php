<?php
include 'koneksi.php';
  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM kelas WHERE id_kelas='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='kelas.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='kelas.php';</script>";
  }         
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
    h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: black;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
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
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
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
      <center>
  
        <h2>Edit Kelas</h2>
      <center>
      <form method="POST" action="proses_editproseskelas.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id" value="<?php echo $data['id_kelas']; ?>"  hidden />
        <div>
          <label>Nama kelas</label>
          <input type="text" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" required=""/>
        </div>
        <div>
          <label>Kompetensi keahlian</label>
         <input type="text" name="kompetensi_keahlian" value="<?php echo $data['kompetensi_keahlian']; ?>" required=""/>
        </div>
        
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
</body>
</html>
