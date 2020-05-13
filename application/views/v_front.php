<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Legalisir Ijazah</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- SweetAlert2 -->
  <link href="<?=base_url()?>assets/sweetalert2-8.18.5/package/dist/sweetalert2.min.css" rel="stylesheet" />

</head>

<body class="bg-gradient-warning">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                   <form action="<?=base_url('Front/login')?>" method="post" enctype="multipart/form-data" role="form" class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat E-mail">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password">
                    </div>
                    <button type="submit" class="btn btn-info btn-user btn-block">Masuk</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?=base_url('register')?>">Bikin Akun Baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

</body>

</html>
