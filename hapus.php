<?php
include "koneksi.php";

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $sql = "DELETE FROM ms_barang WHERE id='$id'";
  $hasil = mysqli_query($kon, $sql);

  if($hasil){
    header("Location: barang.php");
  } else {
    echo "<div class='alert alert-danger'>Gagal menghapus data.</div>";
  }
} else {
  header("Location: barang.php");
}
?>
