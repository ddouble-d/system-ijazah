<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
      <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
      <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary" style="margin-bottom:10px;">
        Tambah
      </button>
      <div class="table-responsive">
        <table class="table table-bordered data" width="100%" cellspacing="0">
          <thead>
            <th width="5%">#</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Status</th>
            <th width="15%">Aksi</th>
          </thead>
          <tbody>

            <?php $no = 1; ?>
            <?php foreach ($userdata as $data) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <?php if ($data['aktif'] == 1) { ?>
                  <td>Terdaftar</td>
                <?php } else { ?>
                  <td>Belum Terdaftar</td>
                <?php } ?>
                <td>
                  <button type="button" data-toggle="modal" data-target="#edit-data<?= $data['uid'] ?>" class="btn btn-warning btn-fill">
                    <i class="fa fa-edit"></i>
                  </button>
                  <a href="<?= base_url('Userdata/delete/' . $data['uid']); ?>" class="btn btn-danger btn-fill tombol-hapus">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of main content -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('userdata/tambah') ?>" method="post" enctype="multipart/form-data" role="form">

        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="col-form-label"><b>NISN</b></label>
            <input class="form-control " name="nisn" id="nisn" type="number" placeholder="Masukkan NISN" required=""></input>
            <span id="cekNisn"></span>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label"><b>Nama</b></label>
            <input class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" type="text" required="" oninvalid="this.setCustomValidity('Nama Belum Terisi!')" oninput="setCustomValidity('')"></input>
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
<!-- End of Modal Tambah -->

<?php $no = 0;
foreach ($userdata as $data) : $no++; ?>
<!-- Modal Update -->
<div class="modal fade" id="edit-data<?= $data['uid'] ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('userdata/edit') ?>" method="post" enctype="multipart/form-data" role="form">
      <input type="hidden" id="uid" name="uid" value="<?= $data['uid'] ?>">
      <input type="hidden" id="originalnisn" name="originalnisn" value="<?= $data['nisn'] ?>">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="col-form-label"><b>NISN</b></label>
            <input class="form-control " name="nisn" id="nisn" type="number" placeholder="Masukkan NISN" value="<?= $data['nisn'] ?>" required=""></input>
            <span id="cekNisn"></span>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label"><b>Nama</b></label>
            <input class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" type="text" value="<?= $data['nama'] ?>"required="" oninvalid="this.setCustomValidity('Nama Belum Terisi!')" oninput="setCustomValidity('')"></input>
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
<?php endforeach; ?>
<script>
  navUserData = document.getElementById('navUserData');
  navUserData.classList.add('active');
</script>