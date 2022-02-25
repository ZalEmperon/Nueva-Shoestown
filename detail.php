<?php
include "conn.php";
session_start();
if (isset($_POST["id_sepatu"])) {
  $id_sepatu = $_POST["id_sepatu"];
  $query = "SELECT * FROM sepatu WHERE id_sepatu = '$id_sepatu'";
  $result = mysqli_query($conn, $query);
  while ($hasil = mysqli_fetch_assoc($result)) { ?>
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-6">
          <img width="90%" height="90%" src="shoesimg/<?php echo $hasil['gambar']; ?>" class="rounded mx-auto d-block border shadow">
        </div>
        <div class="col-sm-6">
          <div class="my-2" style="border-bottom: 3px solid #353535;">
            <h5 class="mt-2 ms-2" style="font-size: 20px!important;"><b><?php echo $hasil['nama_sepatu']; ?></b></h5>
          </div>
          <h5 class="mt-2 ms-2" style="font-size: 20px!important;"><b>Warna :</b><?php echo $hasil['warna']; ?></h5>
          <h5 class="mt-2 ms-2" style="font-size: 20px!important;"><b>Harga : </b>Rp.<?php echo $hasil['harga']; ?></h5>
          <h5 class="mt-2 ms-2" style="font-size: 20px!important;"><b>Jenis : </b><?php echo $hasil['deskripsi']; ?></h5>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
          <?php if (!isset($_SESSION['username'])) { ?>
            <br>
              <?php }elseif ($_SESSION['status'] == "User") { ?>
            <a type="button" class="btn btn-warning mx-2 mb-2 bayarsepatu" data-bs-toggle="modal" data-bs-target="#modalBayar" id="<?php echo $hasil['id_sepatu']; ?>">Beli</a>
            <?php }elseif ($_SESSION['status'] == "Admin"){?>
              <button class="btn btn-warning mx-2 mb-2 editsepatu" data-bs-toggle="modal" data-bs-target="#modalEdit" id="<?php echo $hasil['id_sepatu']; ?>">Edit</button>
              <a class="btn btn-danger mx-2 mb-2 hapussepatu" id="<?php echo $hasil['id_sepatu']; ?>" href="javascript:void(0)">Hapus</a>
          <?php } ?>
          <button type="button" class="btn btn-primary mx-2 mb-2" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {

        //HAPUS DATA
        $('.hapussepatu').click(function() {
          var id = $(this).attr('id');
          Swal.fire({
            title: 'Yakin Ingin Menghapus?',
            text: "Data Sepatu tidak dapat dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                type: 'POST',
                url: "hapus.php",
                data: {
                  id: id
                },
                success: function() {
                  location.reload()
                }
              });
            }
          })
        });

        //AMBIL DATA EDIT
        $('.editsepatu').click(function() {
          var id_sepatu = $(this).attr("id");
          $.ajax({
            url: "ambildata_update.php",
            method: "POST",
            data: {
              id_sepatu: id_sepatu
            },
            dataType: "json",
            success: function(data) {
              $('#id').val(data.id_sepatu);
              $('#sepatuedit').val(data.nama_sepatu);
              $('#hargaedit').val(data.harga);
              $('#warnaedit').val(data.warna);
              $('#deskripsiedit').val(data.deskripsi);
              $('#edit').val("Update");
              $('#modalEdit').modal('show');
            }
          });
        });

        //AMBIL DATA Beli
        $('.bayarsepatu').click(function() {
          var id_sepatu = $(this).attr("id");
          $.ajax({
            url: "ambildata_update.php",
            method: "POST",
            data: {
              id_sepatu: id_sepatu
            },
            dataType: "json",
            success: function(data) {
              $('#id').val(data.id_sepatu);
              $('#productbeli').val(data.nama_sepatu);
              $('#edit').val("Update");
              $('#modalBayar').modal('show');
            }
          });
        });
      });
    </script>
<?php }
} ?>
