<html>
<head>
  <title>FORM DATA BARANG</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    .form-group label {
      display: block;
      margin-bottom: 10px;
    }

    .form-group label input[type="radio"] {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php 
    include "koneksi.php";

    function input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $id = input($_POST["id"]);
      $nama = input($_POST["nama"]);
      $jenis = input($_POST["jenis_barang"]);
      $harga = input($_POST["harga"]);

      $sql = "INSERT INTO ms_barang (id, nama_barang, jenis_barang, harga) VALUES ('$id', '$nama', '$jenis', '$harga')";

      $hasil = mysqli_query($kon, $sql);

      if($hasil){
        header("Location:barang.php");
      }
      else{
        echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
      }
    }
    ?>
    <h2>Input data barang</h2>

    <form method="post">
      <div class="form-group">
        <label>Kode Barang</label>
        <input type="text" name="id" class="form-control" placeholder="Masukkan Kode Barang" required />
      </div>
      <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Barang" required />
      </div>
      <div class="form-group">
        <label>Jenis Barang</label>
        <label><input type="radio" name="jenis_barang" value="Makanan">Makanan</label>
        <label><input type="radio" name="jenis_barang" value="Peralatan Dapur">Peralatan Dapur</label>
        <label><input type="radio" name="jenis_barang" value="Peralatan Mandi">Peralatan Mandi</label>
      </div>
      <div class="form-group">
        <label>Harga:</label>
        <input type="text" name="harga" class="form-control" placeholder="Masukkan Harga Barang" required/>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
