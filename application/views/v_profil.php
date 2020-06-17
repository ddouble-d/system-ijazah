<div class="container-fluid">

  <!-- Page Heading -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
  <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
  <div class="card shadow mb-3" style="max-width: 540px;">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <?php $info = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); ?>
          <span data-toggle="modal" data-target="#edit-data<?= $info['uid'] ?>" class="dropdown-item" style="cursor:pointer">Edit Profil</span>
          <span data-toggle="modal" data-target="#ubah-password<?= $info['uid'] ?>" class="dropdown-item" style="cursor:pointer">Ubah Password</span>
          <?php if ($info['level'] == "User") { ?>
            <span data-toggle="modal" data-target="#ubah-ijazah<?= $info['uid'] ?>" class="dropdown-item" style="cursor:pointer">Ubah Scan Ijazah</span>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/img/default-avatar.png" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $info['nama'] ?></h5>
          <?php if ($info['level'] == "User") { ?>
            <p class="card-text">NISN <?= $info['nisn'] ?></p>
          <?php } ?>
          <p class="card-text"><?= $info['email'] ?> <span data-toggle="modal" data-target="#ubah-email<?= $info['uid'] ?>" style="cursor:pointer" class="m-0 text-primary">Ubah Email</span>
          </p>
          <?php if ($info['level'] == "User") { ?>
            <p class="card-text"><?= $info['no_hp'] ?> <span data-toggle="modal" data-target="#ubah-hp<?= $info['uid'] ?>" style="cursor:pointer" class="m-0 text-primary">Ubah HP</span>
            </p>
            <p class="card-text"><?= $info['tahun_lulus'] ?></p>
            <p class="card-text"><?= $info['alamat'] ?></p>
            <p class="card-text"><a href=<?= '"' . base_url('upload/scan_ijazah/' . $info['scan_ijazah']) . '"'; ?>>
                Lihat Ijazah</a></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit-data<?= $info['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('profil/edit') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" id="uid" name="uid" class="form-control" value="<?= $info['uid'] ?>" readonly>
          <div class="form-group mb-3">
            <label class="col-form-label">Nama</label>
            <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" type="text" value="<?= $info['nama'] ?>" required="" oninvalid="this.setCustomValidity('Nama Belum Terisi!')" oninput="setCustomValidity('')"></input>
          </div>
          <?php if ($info['level'] == "User") { ?>
            <div class="form-group mb-3">
              <label class="col-form-label">Tahun Lulus</label>
              <input class="form-control " name="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="<?= $info['nisn'] ?>" oninput="javascript: if (this.value.length > this.maxLength) 
            this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" required=""></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Alamat</label>
              <textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text" required="" oninvalid="this.setCustomValidity('Alamat Belum Terisi!')" oninput="setCustomValidity('')"><?= $info['alamat'] ?></textarea>
            </div>
          <?php } ?>
        </div>

        <div class="modal-footer">
          <button type="submit" id="simpan" class="btn btn-primary btn-fill">Simpan</button>
          <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal Update -->

<!-- Modal Password -->
<div class="modal fade" id="ubah-password<?= $info['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('profil/ubahPassword') ?>" method="post" enctype="multipart/form-data" role="form">

        <div class="modal-body">
          <input type="hidden" id="uid" name="uid" class="form-control" value="<?= $info['uid'] ?>" readonly>
          <div class="form-group mb-3">
            <label class="col-form-label">Password</label>
            <input class="form-control" id="password" name="password" placeholder="Masukkan Password Baru" type="password" required="" oninvalid="this.setCustomValidity('Password Belum Terisi!')" oninput="setCustomValidity('')"></input>
          </div>
          <!-- <div class="form-group mb-3">
              <label class="col-form-label">Confirm Password</label>
              <input class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru" type="password" required=""></input>
            </div> -->
        </div>

        <div class="modal-footer">
          <button type="submit" id="simpan" class="btn btn-primary btn-fill">Simpan</button>
          <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal Password -->

<!-- Modal Ijazah -->
<div class="modal fade" id="ubah-ijazah<?= $info['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Ubah Ijazah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('profil/ubahIjazah') ?>" method="post" enctype="multipart/form-data" role="form">

        <div class="modal-body">
          <input type="hidden" id="uid" name="uid" class="form-control" value="<?= $info['uid'] ?>" readonly>
          <div class="form-group mb-3">
            <label class="col-form-label">Scan Ijazah</label>
            <input class="form-control-file" id="scan_ijazah" name="scan_ijazah" type="file" required="">
            <label class="text-danger"><small>Pastikan file dalam format .pdf & Ukuran file max 5MB</small></label>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" id="simpan" class="btn btn-primary btn-fill">Ubah</button>
          <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal Ijazah -->

<!-- Modal Email -->
<div class="modal fade" id="ubah-email<?= $info['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Ubah Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('profil/ubahEmail') ?>" method="post" enctype="multipart/form-data" role="form">

        <div class="modal-body">
          <input type="hidden" id="uid" name="uid" class="form-control" value="<?= $info['uid'] ?>">
          <div class="form-group mb-3">
            <input class="form-control " name="email" id="email" placeholder="Masukkan E-mail" type="email" required="" oninvalid="this.setCustomValidity('Perhatikan Kolom E-mail!')" oninput="setCustomValidity('')"></input>
            <span id="cekEmail"></span>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" id="simpan" class="btn btn-primary btn-fill">Ubah</button>
          <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal Email -->
<!-- Modal HP -->
<div class="modal fade" id="ubah-hp<?= $info['uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Ubah HP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('profil/ubahHP') ?>" method="post" enctype="multipart/form-data" role="form">

        <div class="modal-body">
          <input type="hidden" id="uid" name="uid" class="form-control" value="<?= $info['uid'] ?>">
          <div class="form-group mb-3">
            <input class="form-control " name="no_hp" id="no_hp" placeholder="Masukkan No. HP" type="number" required="" oninvalid="this.setCustomValidity('No. HP Belum Terisi!')" oninput="setCustomValidity('')"></input>
            <span id="cekHp"></span>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" id="simpan" class="btn btn-primary btn-fill">Ubah</button>
          <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal HP -->


<script>
  navProfil = document.getElementById('navProfil');
  navProfil.classList.add('active');
</script>