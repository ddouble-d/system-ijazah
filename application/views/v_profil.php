<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url() ?>assets/startbootstrap-sb-admin-2-gh-pages/img/default-avatar.png" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                  <?php $info = $this->db->get_where('tb_user',['email'=>$this->session->userdata('email')])->row_array(); ?>
                    <h5 class="card-title"><?= $info['nama'] ?></h5>
                    <p class="card-text">NISN <?= $info['nisn'] ?></p>
                    <p class="card-text"><?= $info['email'] ?></p>
                    <p class="card-text"><?= $info['alamat'] ?></p>
                    <span data-toggle="modal" data-target="#edit-data<?=$info['uid']?>" class="btn btn-warning btn-fill btn-sm">
                      Edit Profil
                    </span>
                    <span data-toggle="modal" data-target="#ganti-password<?=$info['uid']?>" class="btn btn-warning btn-fill btn-sm">
                      Ganti Password
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

  <!-- Modal Edit -->
  <div class="modal fade" id="edit-data<?=$info['uid']?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="<?=base_url('Profil/edit')?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <input type="hidden" id="uid" name="uid" class="form-control" value="<?=$info['uid']?>" readonly>
            <div class="form-group mb-3">
              <label class="col-form-label">NISN</label>
              <input class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" type="text" value="<?=$info['nisn']?>" required=""
              oninvalid="this.setCustomValidity('NISN Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Nama</label>
              <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" type="text" value="<?=$info['nama']?>" required=""
              oninvalid="this.setCustomValidity('Nama Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Tahun Lulus</label>
              <input class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" type="text" value="<?=$info['nisn']?>" required=""
              oninvalid="this.setCustomValidity('Tahun Lulus Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Alamat</label>
              <textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text" required=""
              oninvalid="this.setCustomValidity('Alamat Belum Terisi!')"
              oninput="setCustomValidity('')"><?=$info['alamat']?></textarea>
            </div>
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
  <div class="modal fade" id="ganti-password<?=$info['uid']?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="<?=base_url('Profil/ubah_password')?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <input type="hidden" id="uid" name="uid" class="form-control" value="<?=$info['uid']?>" readonly>
            <div class="form-group mb-3">
              <label class="col-form-label">Password</label>
              <input class="form-control" id="password" name="password" placeholder="Masukkan Password Baru" type="password" required=""
              oninvalid="this.setCustomValidity('Password Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <!-- <div class="form-group mb-3">
              <label class="col-form-label">Confirm Password</label>
              <input class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru" type="password" required=""></input>
            </div> -->


          <div class="modal-footer">
            <button type="submit" id="simpan" class="btn btn-primary btn-fill">Simpan</button>
            <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Modal Password -->
<!-- <script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Password Tidak Sesuai!");
  } else {
    confirm_password.setCustomValidity('Password Sesuai');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script> -->
