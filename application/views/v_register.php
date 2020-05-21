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
    <link href="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link href="<?= base_url() ?>assets/sweetalert2-8.18.5/package/dist/sweetalert2.min.css" rel="stylesheet" />

</head>

<body class="bg-gradient-warning">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Pendaftaran Akun</h1>
                                    </div>
                                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
                                    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
                                    <form action="<?= base_url('register/daftar') ?>" method="post" enctype="multipart/form-data" role="form" class="user">

                                        <div class="form-group">
                                            <input class="form-control " name="nisn" id="nisn" placeholder="Masukkan NISN" type="number" required="" oninvalid="this.setCustomValidity('NISN Belum Terisi!')" oninput="setCustomValidity('')"></input>
                                            <span id="cekNisn"></span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " name="nama" placeholder="Masukkan Nama Lengkap" type="text" required="" oninvalid="this.setCustomValidity('Nama Belum Terisi!')" oninput="setCustomValidity('')"></input>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " name="email" id="email" placeholder="Masukkan E-mail" type="email" required="" oninvalid="this.setCustomValidity('Perhatikan Kolom E-mail!')" oninput="setCustomValidity('')"></input>
                                            <span id="cekEmail"></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+62</div>
                                                <input class="form-control " name="no_hp" id="no_hp" placeholder="Masukkan No. HP" type="number" required="" oninvalid="this.setCustomValidity('No. HP Belum Terisi!')" oninput="setCustomValidity('')"></input>
                                            </div>
                                        </div>
                                        <span id="cekHp"></span>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <input class="form-control " name="password" id="password" placeholder="Masukkan Password" type="password" required="" oninvalid="this.setCustomValidity('Password Belum Terisi!')" oninput="setCustomValidity('')"></input>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control " name="password2" id="password2" placeholder="Konfirmasi Password" type="password" required="" oninvalid="this.setCustomValidity('Password Belum Terisi!')" oninput="setCustomValidity('')"></input>
                                            </div>
                                        </div>
                                        <span id="cekPassword"></span>
                                        <div class="form-group">
                                            <input class="form-control " name="tahun_lulus" placeholder="Masukkan Tahun Lulus" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" required=""></input>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control " rows="5" name="alamat" placeholder="Masukkan Alamat" type="text" required="" oninvalid="this.setCustomValidity('Alamat Belum Terisi!')" oninput="setCustomValidity('')"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-user btn-block">Daftar</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url() ?>">Ke Halaman Login</a>
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
    <script src="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/js/sb-admin-2.min.js"></script>

    <!-- DataTables -->
    <script src="<?= base_url() ?>assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="<?= base_url() ?>assets/DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/DataTables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/sweetalert2-8.18.5/package/dist/sweetalert2.min.js"></script>

    <!-- Flashdata -->
    <script src="<?= base_url(); ?>assets/script.js?200514"></script>

</body>

</html>