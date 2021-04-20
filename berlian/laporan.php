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
    h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: blue
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
  select {
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
        <h2>Laporan</h2>
      <center>
      <form method="POST" action="ekspor1.php" enctype="multipart/form-data" >
      <section class="base">
    Laporan Transaksi
        <div>
    
          <label>Dari Tanggal</label>
          <input type="date" name="daritanggal" autofocus="" required="" />
        </div>
        <div>
          <label>Sampai Tanggal</label>
         <input type="date" name="sampaitanggal" required=""/>
        </div>
        
        <div>
         <button type="submit">Ekspor ke Word</button>
        </div>
        </section>
      </form>
      <form method="POST" action="" enctype="multipart/form-data" >
      <section class="base">
    Laporan Data Siswa
        <div>
    
           <select name="id_kelas">
       <option value="not_option">Pilih Kelas</option>
       <?php
                $idkelasygdipilih=$data['id_kelas']; 
                $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }
                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
           <option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas']=="$idkelasygdipilih"){?> selected="selected" <?php } ?>><?php echo $row['nama_kelas']; ?></option>
           <?php
                  $no++; 
                }
                ?>
           </select>
       </select>
        </div>
          
      </div>
        <div>
         <button type="submit">Ekspor Ke Word</button>
        </div>
        </section>
      </form>
</body>
</html>