<?php
include "koneksi.php";

function input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = input($_POST["id"]);
  $nama = input($_POST["nama"]);
  $jenis = input($_POST["jenis_barang"]);
  $harga = input($_POST["harga"]);

  $sql = "UPDATE ms_barang SET nama_barang='$nama', jenis_barang='$jenis', harga='$harga' WHERE id='$id'";
  $hasil = mysqli_query($kon, $sql);

  if($hasil){
    header("Location: barang.php");
  } else {
    echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
  }
}
?>
