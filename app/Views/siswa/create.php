<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="page-breadcrumb">
    <ol class="breadcrumb">
      <h1 class="breadcrumb-title"><?= $title; ?></h1>
      <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
      <li class="breadcrumb-item">Siswa</li>
      <li class="breadcrumb-item"><?= $title; ?></li>
    </ol>
  </div>
  <div class="row">
    <!-- left column -->
    <!-- <div class="col-1"></div> -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-outline card-outline-tabs">
        <!-- <div class="card-header" style="background-color: var(--moredark)">
          <h7 class="card-title">Tambah Data Siswa</h7>
        </div> -->
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="post" action="<?= base_url('siswa/tambahdata') ?>" enctype="multipart/form-data">
          <?= csrf_field(); ?>
          <div class="card-body">
            <!-- <div class="form-group">
              <label for="NISN">NISN</label>
              <input type="text" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" placeholder="NISN" name="nisn" value="<?= old('nisn'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nisn'); ?>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="NISN">NISN</label>
                  <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" name="nisn" value="<?= old('nisn'); ?>" autofocus>
                  <div class="invalid-feedback">
                    <?= $validation->getError('nisn'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NIS">NIS</label>
                  <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" id="nis" name="nis" value="<?= old('nis'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nis'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NamaLengkap">Nama Lengkap</label>
                  <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="NamaLengkap" name="nama" value="<?= old('nama'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kelas</label>
                  <select class="custom-select  <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" name="id_kelas" id="id_kelas">
                    <option selected disabled>Pilih Kelas</option>
                    <?php foreach ($kelas as $tampil) : ?>
                      <option value="<?= $tampil['id_kelas']; ?>"><?= $tampil['nama_kelas']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('id_kelas'); ?>
                  </div>
                      <input type="hidden" id="nama_kelas" name="nama_kelas" class="form-control" value="<?= old('nama_kelas'); ?>">
                </div>
              </div>
              <div class="col-md-6">
                <!-- <div class="form-group">
              <label for="Id_Spp">ID SPP</label>
              <input type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="Id_Spp" placeholder="ID SPP" name="id_spp" value="<?= old('id_spp'); ?>">
              <div class="invalid-feedback">
              <?= $validation->getError('id_spp'); ?>
              </div>
            </div> -->
                <div class="form-group">
                  <label>ID SPP</label>
                  <select class="custom-select  <?= ($validation->hasError('id_spp')) ? 'is-invalid' : ''; ?>" name="id_spp" id="id_spp">
                    <option selected disabled>Pilih ID SPP</option>
                    <?php foreach ($spp as $tampil) : ?>
                      <option value="<?= $tampil['id_spp']; ?>">ID: <?= $tampil['id_spp']; ?>, Nominal: <?= $tampil['nominal']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('id_spp'); ?>
                  </div>
                  <input type="hidden" id="nominal" name="nominal" class="form-control" value="<?= old('nominal'); ?>">
                </div>
                <div class="form-group">
                  <label for="No_Telp">No. Telepon</label>
                  <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="No_Telp" name="no_telp" value="<?= old('no_telp'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('no_telp'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Alamat">Alamat</label>
                  <textarea style="height: 126px" autocomplete="off" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="Alamat" name="alamat" value="<?= old('alamat'); ?>"></textarea>
                  <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                  </div>
                </div>
                <div class="form-group row d-none">
                  <div class="col-2">
                    <!-- <label for="gambar">Pilih Foto</label> -->
                    <!-- <div class="col-sm-2"> -->
                    <img src="<?= base_url() ?>/gambar/1.png" class="img-thumbnail img-preview">
                    <!-- </div> -->
                  </div>
                  <div class="col-sm-8">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewJPG()">
                      <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                      </div>
                      <label class="custom-file-label" for="customFile">Pilih foto</label>
                    </div>
                    <small class="form-text text-muted">Format: JPG/JPEG/PNG</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer px-0">
              <!-- <div class="col-sm-8 col-lg-7 mt-2"> -->
              <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
                <span class="icon">
                  <i class="las la-save" style="font-size: 18px"></i>
                </span>
                <span class="text">Simpan</span>
              </button>
              <button type="reset" name="batal" class="btn btn-danger btn-icon-split">
                <span class="icon">
                  <i class="las la-times" style="font-size: 18px"></i>
                </span>
                <span class="text">Batal</span>
              </button>
              <!-- <button type="submit" name="simpan" class="btn btn-primary"><i class="las la-save" style="font-size: 18px"></i> Simpan</button> -->
              <!-- <button type="reset" name="batal" class="btn btn-danger"><i class="las la-times" style="font-size: 18px"></i> Batal</button> -->
              <!-- </div> -->
            </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
</div>
</div>
<script>
  $(document).ready(() => {
    $('#id_kelas').val(`<?= old('id_kelas') ?>`);
    $('#Alamat').val(`<?= old('alamat') ?>`);
    $('#id_spp').val(`<?= old('id_spp') ?>`);
  })
</script>