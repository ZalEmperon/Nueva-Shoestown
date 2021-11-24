<?php
include "conn.php";
session_start();
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $selectimg = "SELECT * FROM sepatu WHERE id_sepatu ='$id'";
  $hasil = mysqli_query($conn,$selectimg);
  $fetch = mysqli_fetch_assoc($hasil);
  $fetchnamaimg = $fetch['gambar'];
  $pathimg = "./shoesimg/".$fetchnamaimg;
  if(unlink($pathimg)){
    $query = "DELETE FROM sepatu WHERE id_sepatu ='$id'";
    mysqli_query($conn, $query);
  }else{
    $displayErrMessage = "Gambar Tidak Terhapus";
  }
}
?>