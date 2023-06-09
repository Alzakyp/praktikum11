<?php
include "koneksi.php";

if(!isset($_GET['id'])){
  header('location: view.php');
}

$id = $_GET['id'];

$sql ="SELECT * FROM ms_barang WHERE id=$id";
$query = mysqli_query($kon, $sql);
$barang = mysqli_fetch_array($query);

if(mysqli_num_rows($query) < 1){
  die("Data tidak ditemukan.");
}
?>

<html>
  <head>
    <title>FORM DATA BARANG</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      color: #333;
    }

    .container {
      margin-top: 20px;
    }

    h2 {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="radio"] {
      margin-top: 10px;
    }

    input[type="submit"],
    input[type="button"] {
      margin-top: 10px;
    }
  </style>
  </head>
  <body>
    <div class="container">
      <h2>Update data</h2>
      <form action="aksi-update.php" method="POST">
        <fieldset>
          <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="<?php echo $barang['id']; ?>" />
          </div>
          <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <?php $jenis_barang = $barang['jenis_barang']; ?>
            <label><input type="radio" name="jenis_barang" value="Makanan" <?php echo ($jenis_barang == 'Makanan') ? "checked" : ""; ?>>Makanan</label>
            <label><input type="radio" name="jenis_barang" value="Peralatan Dapur" <?php echo ($jenis_barang == 'Peralatan Dapur') ? "checked" : ""; ?>>Peralatan Dapur</label>
            <label><input type="radio" name="jenis_barang" value="Peralatan Mandi" <?php echo ($jenis_barang == 'Peralatan Mandi') ? "checked" : ""; ?>>Peralatan Mandi</label>
          </div>
          <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" class="form-control" placeholder="Harga Barang" value="<?php echo $barang['harga']; ?>">
          </div>
          <br>
          <p>
            <input type="submit" value="Simpan" name="simpan"/>
            <input type="button" value="Kembali" onclick="history.back(-1)"/>
          </p>
        </fieldset>
      </form>
    </div>
  </body>
</html>
