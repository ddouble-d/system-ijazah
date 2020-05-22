<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
    </div>
    <div class="card-body">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
      <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('gagal') ?>"></div>
      <?php if ($info['level'] != "Admin") {
        if ($cek > 1) { ?>
          <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary" style="margin-bottom:10px;">
            Tambah
          </button>
        <?php }
        if ($cekstatus) { ?>
          <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary" style="margin-bottom:10px;" disabled>
            Tambah
          </button>
          <p class="text-danger">*Untuk mengajukan lagi, pengajuan sebelumnya harus diproses dahulu</p>
        <?php } else { ?>
          <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary" style="margin-bottom:10px;">
            Tambah
          </button>
      <?php }
      } ?>
      <div class="table-responsive">
        <table class="table table-bordered data" id="tbpengajuan" width="100%" cellspacing="0">
          <thead>
            <th>No. Pengajuan</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Scan</th>
            <th>Tanggal Pengajuan</th>
            <th>No. Resi</th>
            <th>Keterangan</th>
            <th>Status</th>
            <?php if ($info['level'] == "Admin") { ?>
              <th>Aksi</th>
            <?php } ?>
          </thead>
          <tbody>
            <?php foreach ($userdata as $data) : ?>
              <tr>
                <td><?= $data['id_pengajuan'] ?></td>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><a href=<?php echo '"' . base_url('upload/scan_ijazah/' . $data['scan_ijazah']) . '"'; ?>>
                    <img width="50" height="50" src="<?php echo base_url('assets/startbootstrap-sb-admin-2-gh-pages/img/pdf.png') ?>" alt=""></a></td>
                <td><?= $data['log_pengajuan'] ?></td>
                <td><?= $data['no_resi'] ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td><?= $data['status'] ?></td>
                <?php if ($info['level'] == "Admin") { ?>
                  <td>
                    <?php if ($data['status'] == "Sudah Dikirim") { ?>
                      <button type="button" data-toggle="modal" data-target="#edit-data<?= $data['id_pengajuan'] ?>" class="btn btn-warning btn-fill btn-sm" disabled>
                        Proses
                      </button>
                    <?php }
                    if ($data['status'] == "Belum Diproses") { ?>
                      <span data-toggle="modal" data-target="#edit-data<?= $data['id_pengajuan'] ?>" class="btn btn-warning btn-fill btn-sm">
                        Proses
                      </span>
                    <?php } ?>
                  </td>
                <?php } ?>
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
        <h5 class="modal-title">Tambah Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('Pengajuan/tambah') ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="col-form-label">NISN</label>
            <input class="form-control" id="nisn" name="nisn" type="text" required="" value="<?= $info['nisn'] ?>" readonly></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Nama</label>
            <input class="form-control" id="nama" name="nama" type="text" required="" value="<?= $info['nama'] ?>" readonly></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Alamat</label>
            <input class="form-control" id="alamat" name="alamat" type="text" required="" value="<?= $info['alamat'] ?>" readonly></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Scan Ijazah</label>
            <input class="form-control-file" id="scan_ijazah" name="scan_ijazah" type="file" required="">
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
  <div class="modal fade" id="edit-data<?= $data['id_pengajuan'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Proses Data Pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="<?= base_url('pengajuan/prosesStatus') ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <input type="hidden" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>">
            <div class="form-group mb-3">
              <label class="col-form-label">No. Pengajuan</label>
              <input class="form-control" id="id_pengajuan" name="id_pengajuan" type="text" required="" value="<?= $data['id_pengajuan'] ?>" readonly></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">NISN</label>
              <input class="form-control" id="nisn" name="nisn" type="text" required="" value="<?= $data['nisn'] ?>" readonly></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Nama</label>
              <input class="form-control" id="nama" name="nama" type="text" required="" value="<?= $data['nama'] ?>" readonly></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Email</label>
              <input class="form-control" id="email" name="email" type="text" required="" value="<?= $data['email'] ?>" readonly></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">No. HP</label>
              <input class="form-control" id="no_hp" name="no_hp" type="text" required="" value="<?= $data['no_hp'] ?>" readonly></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">No. Resi</label>
              <input class="form-control" id="no_resi" name="no_resi" placeholder="Masukkan Nomor Resi Pengiriman" type="text" required="" oninvalid="this.setCustomValidity('No. Resi Belum Terisi!')" oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Keterangan</label>
              <input class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" type="text" required="" oninvalid="this.setCustomValidity('Keterangan Belum Terisi!')" oninput="setCustomValidity('')"></input>
            </div>


            <div class="modal-footer">
              <button type="submit" id="simpan" class="btn btn-primary btn-fill">Simpan</button>
              <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- End of Modal Update -->
<?php endforeach; ?>

<script>
  navPengajuan = document.getElementById('navPengajuan');
  navPengajuan.classList.add('active');
</script>