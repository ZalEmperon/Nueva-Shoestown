<?php
include "conn.php" ;
if(!isset($_POST['sepatuadd'])){
  header("Location: index.php");
  exit;
}

  $nama_sepatu = $_POST['sepatuadd'];
  $harga = $_POST['hargaadd'];
  $warna = $_POST['warnaadd'];
  $deskripsi = $_POST['deskripsiadd'];
  
  $nama_gambar = $_FILES['gambaradd']['name'];
  $sumber = $_FILES['gambaradd']['tmp_name'];
  $ekstension = pathinfo($nama_gambar, PATHINFO_EXTENSION);
  $gambarbaru = "{$nama_sepatu}-".date('dmYHis').".{$ekstension}";
  $pathfile = './shoesimg/'.$gambarbaru;
  $pindah = move_uploaded_file($sumber, $pathfile);

  $query = "INSERT INTO sepatu (nama_sepatu, harga, warna, gambar, deskripsi, link) VALUES ('$nama_sepatu', '$harga', '$warna', '$gambarbaru','$deskripsi','https://wa.me/085747336294?text=Saya%20Tertarik%20untuk%20Membeli%20Sepatu');";
  mysqli_query($conn,$query);
?>
! 
