<?php
include 'conn.php';
session_start();
if (!isset($_POST['search'])) {
  header("Location: index.php");
  exit;
}
if (isset($_POST['search'])) {
  $sepatu = $_POST['search'];
  $hasil = mysqli_query($conn, "SELECT * FROM sepatu WHERE nama_sepatu LIKE '%{$sepatu}%'");
}
while ($value = mysqli_fetch_assoc($hasil)) { ?>
  <div class="col-md-3 me-2 my-1 bg-light rounded shadow details" data-id="<?php echo $value['id_sepatu']; ?>" data-bs-toggle="modal" data-bs-target="#modalDetail">
    <img src="shoesimg/<?php echo $value['gambar'] ?>" width="100%" height="300px" class="my-3 rounded shadow d-inline-block mx-auto">
    <h6 class="fw-bold"><?php echo $value['nama_sepatu'] ?></h6>
    <h6><?php echo $value['warna'] ?></h6>
  </div>
  <script>
    $(document).ready(function() {

      // DETAIL SEARCHING
      $('.details').click(function() {
        var id_sepatu = $(this).data("id")
        $.ajax({
          url: "detail.php",
          method: "POST",
          data: {
            id_sepatu: id_sepatu
          },
          success: function(data) {
            $("#data-sepatu").html(data)
            $("#modalDetail").modal('show')
          }
        });
      });
    });
  </script>
<?php } ?>