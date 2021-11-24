<?php
require "conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!--Head-->

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
  <title>Home | SHOESTOWN</title>
  <style></style>
</head>

<body>

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
                <li><a class="dropdown-item" id="logout" name="logout">Logout</a></li>
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
    
  <!--ATAS-->
  <div class="p-5 mb-4" style="background-image:url('assets/img/bekpatu.jpg'); height: 90vh;">
    <div class="container-fluid py-5">
      <h1 class="display-6 fw-bold text-light text-end shadow-texts">PILIH SEPATU KESUKAANMU</h1>
      <p class="col-md fs-6 text-light text-end shadow-texts">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>

  <!--TENGAH-->
  <div class="container text-center my-3">
    <img src="assets/img/bekpatu2.png" class="img-fluid rounded">
    <h1 class="fw-bolder text-center my-2">MULAI CARI SEPATUMU</h1>
    <a class="btn btn-dark rounded-pill fw-bold" href="katalog.php">CARI SEKARANG</a>
  </div>

  <!--BAWAH-->
  <div class="container my-2">
    <div class="row text-center">
      <div class="col-sm-4 my-3">
        <img src="assets/img/pria.webp" class="rounded img-fluid" style="object-fit:cover; height:450px; width:250px; object-position: left;">
        <p class="h4 fw-bolder">PRIA</p>
        <a class="btn btn-dark rounded-pill fw-bold" href="katalog.php?search=Pria">CARI</a>
      </div>
      <div class="col-sm-4 my-3">
        <img src="assets/img/wanita.webp" class="rounded img-fluid" style="object-fit:cover; height:450px; width:250px; object-position: center;">
        <p class="h4 fw-bolder">WANITA</p>
        <a class="btn btn-dark rounded-pill fw-bold" href="katalog.php?search=Wanita">CARI</a>
      </div>
      <div class="col-sm-4 my-3">
        <img src="assets/img/anak.webp" class="rounded img-fluid" style="object-fit:cover; height:450px; width:250px; object-position: center;">
        <p class="h4 fw-bolder">ANAK-ANAK</p>
        <a class="btn btn-dark rounded-pill fw-bold" href="katalog.php?search=Anak-anak">CARI</a>
      </div>
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

  <!--SCRIPT JS & AJAX-->

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
    });
  </script>
</body>

</html>