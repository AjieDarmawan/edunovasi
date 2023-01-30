<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?php echo base_url('assets/custom.css') ?>" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <script type="text/javascript" src="<?php echo base_url('assets/assets/plugins/jquery/js/jquery.min.js') ?>">
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.19/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <title>Landing Eduschool</title>
</head>

<body>
  <style>
    .navbar .nav-link {
      font-weight: bold;
    }

    .navbar .nav-link:hover {
      color: #fff !important;
    }

    .btnnavbar {
      font-size: 12px;
    }

    #login {
      background: rgb(247, 127, 0);
      background: radial-gradient(circle,
          rgba(252, 191, 73, 1) 20%,
          rgba(247, 127, 0, 1) 75%,
          rgba(247, 127, 0, 1) 100%);
      min-height: 100vh;
    }

    #login button {
      box-shadow: 0px 3px 6px #00000029;
      border-radius: 8px;
      font: normal normal bold 20px/27px Open Sans;
      letter-spacing: 0px;
      color: #ffffff;
    }

    #login .regist {
      font: normal normal normal 20px/27px Open Sans;
      letter-spacing: 0px;
      color: #003049;
    }

    #login .regist a {
      font: normal normal bold 18px Open Sans;
      letter-spacing: 0px;
      color: #00415a;
      text-decoration: none;
    }

    #login .regist a:hover {
      color: #002038;
    }

    #login .forgot a {
      font: normal normal bold 14px Open Sans;
      letter-spacing: 0px;
      color: #00415a;
      text-decoration: none;
    }

    #login .forgot a:hover {
      color: #002038;
    }

    #login .form-label {
      font: normal normal normal 16px Open Sans;
      letter-spacing: 0px;
      color: #003049;
    }

    input::placeholder {
      font: normal normal normal 14px Open Sans;
      letter-spacing: 0px;
      color: #707070;
    }

    .field-icon {
      float: right;
      margin-right: 10px;
      margin-top: -25px;
      position: relative;
      z-index: 999999999999999;
    }
  </style>
  <!-- navbar -->
  <nav class="navbar navbar-custom fixed-top navbar-expand-lg">
    <div class="container">
      <a href="https://edunovasi.com/#">
        <img href="https://edunovasi.com" src="https://edunovasi.com/assets/ic/logodotcom.png" class="img-fluid" style="height: 32px; cursor: pointer" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-4">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>#keunggulan">Keunggulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>#daftar">Bermitra</a>
          </li>
        </ul>
        <!-- <button class="btn btn-sm btn-outline-primary d-flex" type="submit">
            <span class="material-icons"> account_circle </span
            >&nbsp;Login&nbsp;
          </button> -->
      </div>
    </div>
  </nav>

  <?php
  $inc_ = base_url('dashboard_admin');
  $base_api_sekolah = 'https://backend.edunovasi.com/api_mobile/api_m_sekolah/';

  if (isset($_POST['btn_login'])) {
    unset($_POST['btn_login']);

    $postcurl_login = postcurl($base_api_sekolah . 'login_sekolah', $_POST);


    //eduprint($postcurl_login);


    if ($postcurl_login['status'] == '200') {
      $datalogin = $postcurl_login;

      $this->session->set_userdata(array('userdata' => $datalogin));

      // eduprint($datalogin);

      echo "<script>
            var tryout_goto = '" . $inc_ . "';
            if (sessionStorage.getItem('tryout_goto')) {
                tryout_goto = tryout_goto + sessionStorage.getItem('tryout_goto');
            }
            sessionStorage.removeItem('tryout_goto');
            sessionStorage.removeItem('verify_email');
            window.location.href = tryout_goto;
        </script>";
    } else if ($postcurl_login['status'] == '400') {


      //   eduprint($datalogin);
      echo "<script>
            Swal.fire(
              'Gagal',
              'Email atau passsword salah !',
              'error'
            )
            </script>";
    }
  }
  ?>

  <!-- form login -->
  <section id="login" class="d-flex align-items-center">
    <div class="container">
      <h3 class="text-center mb-5">Login Sekolah / Komunitas</h3>

      <div class="col-12 col-md-6 p-4 p-md-0 mx-auto">
        <form class="row" method="POST">
          <div class="col-12 mb-2">
            <label for="email" class="form-label">Email / Username</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email / Username" required />
          </div>
          <div class="col-12 mb-2">
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required />
              <i toggle="#password" class="fa fa-fw fa-eye text-primary field-icon toggle-password mr-3" onclick="if (!window.__cfRLUnblockHandlers) return false; lihat('toggle-password')" data-cf-modified-3d2b90a2403ad7880ab71dd1-=""></i>
            </div>
          </div>
          <div class="col-12 text-end forgot">
            <!-- <a href="https://edunovasi.com/forgot">Lupa kata sandi?</a> -->
            <a target="_blank" href="https://api.whatsapp.com/send?phone=6281213449117&text=Hi%20Admin,%0aPerkenalkan%20Saya%20.....%0a%20Mohon%20info%20terkait%20.....%0a%0aTerima%20kasih.">Lupa kata sandi ? Hubungi Admin kami</a>
          </div>
          <div class="col-12 my-3">
            <button name="btn_login" type="submit" class="btn btn-primary w-100 rounded-3">
              Login
            </button>
          </div>
          <div class="col-12 text-center regist">
            Belum punya akun ?
            <!-- <a class="fw-bold" href="https://edunovasi.com/register"
                >Daftar disini</a
              > -->
            <a class="fw-bold" href="<?php echo base_url() ?>#daftar">Daftar Menjadi Mitra</a>
          </div>
        </form>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    function goto() {
      tryout_goto = "<?php echo $inc_ ?>";
      if (sessionStorage.getItem('tryout_goto')) {
        tryout_goto = tryout_goto + sessionStorage.getItem('tryout_goto');
      }
      window.location.href = tryout_goto;
    }
  </script>


</body>

</html>