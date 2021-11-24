<?php
include "conn.php" ;
if (isset($_POST['id'])){
  $id = $_POST['id'];
  $nama_sepatu = $_POST['sepatuedit'];
  $harga = $_POST['hargaedit'];
  $warna = $_POST['warnaedit'];
  $deskripsi = $_POST['deskripsiedit'];
  
  // var_dump();
  // die;
  if(file_exists($_FILES['gambaredit']['tmp_name'])){
    $nama_gambar = $_FILES['gambaredit']['name'];
    $sumber = $_FILES['gambaredit']['tmp_name'];
    $ekstension = pathinfo($nama_gambar, PATHINFO_EXTENSION);
    $gambarbaru = "{$nama_sepatu}-".date('dmYHis').".{$ekstension}";
    $pathfile = './shoesimg/'.$gambarbaru;
    $pindah = move_uploaded_file($sumber, $pathfile);
    $query = "UPDATE sepatu SET gambar='$gambarbaru' WHERE id_sepatu = '$id'";
    mysqli_query($conn,$query);
  }

  $query = "UPDATE sepatu SET nama_sepatu='$nama_sepatu', harga='$harga', warna='$warna', deskripsi='$deskripsi' WHERE id_sepatu = '$id'";
  mysqli_query($conn,$query);
}else{
  header("Location: index.php");
  exit;
}
?>
