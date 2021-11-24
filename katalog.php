<?php
require "conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!--CSS & FONT-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.ico">
  <title>Katalog | SHOESTOWN</title>
  <style>
    @media (min-width: 768px) {
      .col-md-3 {
        width: 24.1% !important;
      }
    }
  </style>
</head>

<body id="beranda">

  <!--HEADER / NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html" class="fw-bolder"><img src="assets/img/icon.svg" height="50" width="50"><span class="mx-2 fw-bold h4 align-middle">SHOESTOWN</span></a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="container"></div>
        <div class="navbar-nav ml-auto">
          <a class="nav-link mx-2 text-dark" aria-current="page" href="index.php">Beranda</a>
          <a class="nav-link mx-2 text-dark" href="katalog.php">Katalog</a>
          <a class="nav-link mx-2 text-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalAbout">Tentang</a>
          <li class="nav-item dropdown">
            <!--SUDAH LOGIN-->
            <?php if (isset($_SESSION['username'])) { ?>
              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['username']; ?> - <?php echo $_SESSION['status']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item mx-2" id="logout" name="logout">Logout</a></li>
              </ul>
              <!--BELUM LOGIN-->
            <?php } else { ?>
              <a class="nav-link dropdown-toggle text-dark mx-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Masuk
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLogin">Login</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalRegister">Register</a></li>
              </ul>
            <?php } ?>
          </li>
        </div>
      </div>
    </div>
  </nav>

  <!--SEPATU & SEARCH-->
  <div class="container pt-3">
    <h1 class="fw-bold display-5 mb-3" id="Sepatu">Sepatu-Sepatu</h1>
    <p class="fw-bold h3">Cari Sepatu</p>
    <form class="d-flex mb-4" action="" method="POST">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
    </form>
    <?php
    if (!isset($_SESSION['status']) || ($_SESSION['status'] != "Admin")) { ?>
      <br>
    <?php } else { ?>
      <Button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Sepatu</Button><br><br>
    <?php } ?>
    <div class="row mx-auto mb-5" id="tampil">
      <?php
      if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $hasil = mysqli_query($conn, "SELECT * FROM sepatu WHERE deskripsi like '%" . $search . "%'");
      }else{
        $hasil = mysqli_query($conn, "SELECT * FROM sepatu ORDER BY id_sepatu ASC");
      }
      while ($value = mysqli_fetch_assoc($hasil)) : ?>
        <div class="col-md-3 me-2 my-1 bg-light rounded shadow details" data-id="<?php echo $value['id_sepatu']; ?>" data-bs-toggle="modal" data-bs-target="#modalDetail">
          <img src="shoesimg/<?php echo $value['gambar'] ?>" width="100%" height="275px" class="my-3 rounded shadow d-inline-block mx-auto">
          <h6 class="fw-bold"><?php echo $value['nama_sepatu'] ?></h6>
          <h6><?php echo $value['warna'] ?></h6>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!--FOOTER / AKHIR-->
  <footer class="bg-dark mt-5">
    <div class="container py-4">
      <div class="row">
        <div class="col-sm-1 text-center my-2">
          <img src="assets/img/icon.svg" height="60" width="60">
        </div><br>
        <div class="col-sm-5 my-2" style="border-right: 1px solid #858585;">
          <p class="text-light small-F text-justify" style="text-align:justify;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley and scrambled it to make a type specimen book.</p>
        </div>
        <div class="col-sm-3 my-2" style="border-right: 1px solid #858585;">
          <h6 class="text-light">Social Media</h6>
          <a href="https://web.facebook.com/profile.php?id=100009463588902" class="blue small-F"><i class="fab fa-facebook-square small-F"></i> Facebook</a><br>
          <a href="https://www.instagram.com/kalamithron/" class="violet small-F"><i class="fab fa-instagram-square small-F"></i> Instagram</a><br>
          <a href="https://www.youtube.com/channel/UCBobORGvBKIW19HZXj_xNSQ" class="red small-F"><i class="fab fa-youtube-square small-F"></i> Youtube</a><br>
        </div>
        <div class="col-sm-3 my-2 text-white">
          <h6 class="text-light">Contact Us</h6>
          <p class="small-F p">0123 456 7890</p>
          <p class="small-F p">gregetbanget99@gmail.com</p>
          <p class="small-F p">Jalan monas -Jakarta</p>
        </div>
        <p class="text-center my-3 text-secondary small-F">Copyright© 2021 - Sus. All Right Reserved</p>
      </div>
    </div>
  </footer>

  <!--ISI MODAL-->
  <div>
    <!--MODAL TENTANG-->
    <div class="modal fade" id="modalAbout" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center headernocenter">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button><br><br>
            <img class="mx-auto" src="assets/img/icon.svg" alt="Gambar Shoestown" height="200" width="200">
            <h2 class="fw-bold align-middle text-dark">Shoestown</h2>
            <p class="text-justify indentabout">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident amet tempora sit cum odio? Explicabo eius praesentium inventore. Doloribus dolorum deleniti reiciendis, nesciunt officia id vel beatae dolores sapiente adipisci, nisi necessitatibus quisquam voluptates omnis est inventore distinctio expedita quos explicabo qui laboriosam harum, officiis ea aut? Ex, temporibus.</p>
          </div>
        </div>
      </div>
    </div>

    <!--MODAL LOGIN-->
    <div class="modal fade" id="modalLogin" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headernocenter" style="background-image: url(assets/img/shoeslogin.jpg);height:200px;width:100.1%;background-repeat: no-repeat;background-size: cover;">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <h5 class="text-center fw-bold">LOGIN</h5>

            <!--F O R M L O G I N-->
            <form id="formlogin">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="bambangjuan">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success my-2" data-bs-dismiss="modal" id="tblLogin" name="tblLogin">Login</button><br>
                <p class="text-reset my-auto h7">Belum mempunyai akun?<br><a class="text-primary fw-bold h7" href="" data-bs-toggle="modal" data-bs-target="#modalRegister">Buat Akun</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL REGISTER-->
    <div class="modal fade" id="modalRegister" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header headernocenter" style="background-image: url(assets/img/shoesregister.jpg);height:200px;width:100.1%;background-repeat: no-repeat;background-size: cover;">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body container">
            <h5 class="text-center fw-bold">REGISTER</h5>

            <!--F O R M R E G I S T E R-->
            <form action="" method="POST" id="formRegister">
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control form-control-sm" id="usernameregister" name="usernameregister" placeholder="Masukan Username">
              </div>
              <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control form-control-sm" id="emailregister" name="emailregister" placeholder="Masukan Alamat Email">
              </div>
              <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="passwordregister" name="passwordregister" placeholder="Masukan Password">
              </div>
              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success my-2" data-bs-dismiss="modal" id="register">Register!</button><br>
                <p class="text-reset my-auto h7">Sudah mempunyai akun?<br><a class="text-warning fw-bold h7" href="" data-bs-toggle="modal" data-bs-target="#modalLogin">Login Sekarang</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL TAMBAH-->
    <div class="modal fade" id="modalTambah" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body container">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button><br><br>
            <h5 class="text-center fw-bold">TAMBAH DATA</h5>

            <!--F O R M T A M B A H-->
            <form action="" method="POST" id="formTambah" enctype="multipart/form-data">
              <div class="mb-2">
                <label class="form-label">Gambar Sepatu</label>
                <input type="file" class="form-control form-control-sm" id="gambaradd" name="gambaradd">
              </div>
              <div class="mb-2">
                <label class="form-label">Nama Sepatu</label>
                <input type="text" class="form-control form-control-sm" id="sepatuadd" name="sepatuadd" placeholder="Masukan Nama Sepatu">
              </div>
              <div class="mb-2">
                <label class="form-label">Harga Sepatu</label>
                <input type="text" class="form-control form-control-sm" id="hargaadd" name="hargaadd" placeholder="Masukan Harga">
              </div>
              <div class="mb-2">
                <label class="form-label">Warna Sepatu</label>
                <input type="text" class="form-control form-control-sm" id="warnaadd" name="warnaadd" placeholder="Masukan Warna">
              </div>
              <div class="mb-2">
                <label class="form-label">Deskipsi Sepatu</label>
                <textarea class="form-control form-control-sm" id="deskripsiadd" name="deskripsiadd" placeholder="Masukan Deskripsi" rows="2"></textarea>
              </div>
              <button type="submit" class="btn btn-success my-2" data-bs-dismiss="modal" id="tambah">Tambah</button><br>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL EDIT-->
    <div class="modal fade" id="modalEdit" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body container">
            <h5 class="text-center fw-bold">EDIT DATA</h5>

            <!--FORM EDIT-->
            <form action="" method="POST" id="formEdit" enctype="multipart/form-data">
              <input name="id" type="hidden" id="id" />
              <div class="mb-2">
                <label class="form-label">Gambar Sepatu</label>
                <input type="file" class="form-control form-control-sm" id="gambaredit" name="gambaredit">
              </div>
              <div class="mb-2">
                <label class="form-label">Nama Sepatu</label>
                <input type="text" class="form-control form-control-sm" id="sepatuedit" name="sepatuedit" placeholder="Edit Nama Sepatu">
              </div>
              <div class="mb-2">
                <label class="form-label">Harga Sepatu</label>
                <input type="text" class="form-control form-control-sm" id="hargaedit" name="hargaedit" placeholder="Edit Harga">
              </div>
              <div class="mb-2">
                <label class="form-label">Warna Sepatu</label>
                <input type="text" class="form-control form-control-sm" id="warnaedit" name="warnaedit" placeholder="Edit Warna">
              </div>
              <div class="mb-2">
                <label class="form-label">Deskripsi Sepatu</label>
                <textarea class="form-control form-control-sm" id="deskripsiedit" name="deskripsiedit" placeholder="Edit Deskripsi" rows="2"></textarea>
              </div>
              <button type="submit" class="btn btn-success my-2" data-bs-dismiss="modal" id="edit">Edit Data</button><br>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!--MODAL DETAIL-->
    <div class="modal fade" id="modalDetail" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="data-sepatu">

        </div>
      </div>
    </div>
  </div>

  <!--SCRIPT & AJAX-->
  <script src="assets/js/sweetalert.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script>
    $(document).ready(function() {

      // LOGIN
      $('#tblLogin').click(function() {
        var email = $('#email').val();
        var password = $('#password').val();
        if (email != '' && password != '') {
          $.ajax({
            url: "login.php",
            method: "POST",
            data: {
              email: email,
              password: password
            },
            success: function(datalogin) {
              if (datalogin == 'No') {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Email Atau Password Salah'
                })
                $('#formlogin').trigger("reset");
              } else {
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil Login',
                  showCancelButton: false,
                  showConfirmButton: false
                })
                setTimeout(function() {
                  location.reload();
                }, 1500);
              }
            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Isi Password dan Email!'
          })
        }
      });

      // LOGOUT
      $('#logout').click(function() {
        var action = "logout";
        $.ajax({
          url: "login.php",
          method: "POST",
          data: {
            action: action
          },
          success: function() {
            location.reload();
          }
        });
      });

      // DETAIL
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

      // SEARCH
      $('#search').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: 'search.php',
          data: {
            search: $('#search').val()
          },
          success: function(data) {
            $('#tampil').html(data)
          }
        });
      });

      //TAMBAH DATA
      $('#formTambah').on("submit", function(event) {
        event.preventDefault();
        if ($('#sepatuadd').val() == "" || $('#hargaadd').val() == "" || $('#warnaadd').val() == "" || $('#gambaradd').val() == "" || $('#deskripsiadd').val() == "") {
          Swal.fire({
            icon: 'error',
            text: 'Lengkapi Semua Data!'
          });
          $('#formTambah').trigger("reset");
        } else {
          const gambar = $('#gambaradd').prop('files')[0];
          const nama_sepatu = $('#sepatuadd').val();
          const harga = $('#hargaadd').val();
          const warna = $('#warnaadd').val();
          const deskripsi = $('#deskripsiadd').val();
          let formTambah = new FormData();
          formTambah.append('gambaradd', gambar);
          formTambah.append('sepatuadd', nama_sepatu);
          formTambah.append('hargaadd', harga);
          formTambah.append('warnaadd', warna);
          formTambah.append('deskripsiadd', deskripsi);
          $.ajax({
            url: "tambah.php",
            method: "POST",
            data: formTambah,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
              $('#formTambah')[0].reset();
              $('#modalTambah').modal('hide');
              location.reload();
            }
          });
        }
      });

      //REGISTER
      $('#formRegister').on("submit", function(event) {
        event.preventDefault();
        if ($('#usernameregister').val() == "" || $('#emailregister').val() == "" || $('#passwordregister').val() == "") {
          Swal.fire({
            icon: 'error',
            text: 'Lengkapi Semua Data!'
          });
        } else {
          $.ajax({
            url: "register.php",
            method: "POST",
            data: $('#formRegister').serialize(),
            beforeSend: function() {
              $('#register').val("Inserting");
            },
            success: function() {
              Swal.fire({
                icon: 'success',
                title: 'Akun Berhasil dibuat, Silahkan Login',
                showCancelButton: false,
                showConfirmButton: false
              })
              setTimeout(function() {
                $('#formRegister')[0].reset();
                $('#modalRegister').modal('hide');
                location.reload();
              }, 2000);
            }
          });
        }
      });

      //UPDATE
      $('#formEdit').on("submit", function(event) {
        event.preventDefault();
        if ($('#sepatuedit').val() == "" || $('#hargaedit').val() == "" || $('#warnaedit').val() == "" || $('#deskripsiedit').val() == "") {
          Swal.fire({
            icon: 'error',
            text: 'Lengkapi Semua Data!'
          });
          $('#formEdit').trigger("reset");
        } else {
          const id = $("input[name='id']").val();
          const gambar = $('#gambaredit').prop('files')[0];
          const nama_sepatu = $('#sepatuedit').val();
          const harga = $('#hargaedit').val();
          const warna = $('#warnaedit').val();
          const deskripsi = $('#deskripsiedit').val();
          let formEdit = new FormData();
          formEdit.append('id', id);
          formEdit.append('gambaredit', gambar);
          formEdit.append('sepatuedit', nama_sepatu);
          formEdit.append('hargaedit', harga);
          formEdit.append('warnaedit', warna);
          formEdit.append('deskripsiedit', deskripsi);
          $.ajax({
            url: "update.php",
            method: "POST",
            data: formEdit,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
              $('#modalEdit').modal('hide');
              location.reload();
            }
          });
        }
      });
    });
  </script>
</body>

</html>