<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<div class="container-fluid">
  <!-- Page Heading -->
<div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">Kelas</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div>
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-outline card-outline-tabs">
        <!-- <div class="card-header">
          <h7 class="card-title">Tambah Data Kelas</h7>
        </div> -->
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="<?= base_url('kelas/tambah') ?>">
        <?= csrf_field(); ?>
          <div class="card-body">
            <!-- <div class="form-group">
              <label for="ID Kelas">ID Kelas</label>
              <input type="text" class="form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" id="id_kelas" placeholder="ID Kelas" name="id_kelas" value="<?= old('id_kelas'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('id_kelas'); ?>
              </div>
            </div> -->
            <div class="row">
              <!-- <div class="col-md-3"></div> -->
            <div class="col-md-6">
            <div class="form-group">
              <label for="ID Kelas">ID Kelas</label>
              <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" id="id_kelas" name="id_kelas" value="<?= old('id_kelas'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('id_kelas'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="Nama Kelas">Nama Kelas</label>
              <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : ''; ?>" id="nama_kelas" name="nama_kelas" value="<?= old('nama_kelas'); ?>">
              <div class="invalid-feedback">
                <?= $validation->getError('nama_kelas'); ?>
              </div>
            </div>
            <div class="form-group">
              <label>Kompetensi Keahlian</label>
              <select class="custom-select <?= ($validation->hasError('kompetensi_keahlian')) ? 'is-invalid' : ''; ?>" name="kompetensi_keahlian" id="kompetensi_keahlian">
                <option disabled selected>Pilih Kompetensi Keahlian</option>
                <option value="RPL">RPL (Rekayasa Perangkat Lunak)</option>
                <option value="TKJ">TKJ (Teknik Komputer Dan Jaringan)</option>
                <option value="EI">EI (Elektronika Industri)</option>
                <option value="MM">MM (Multimedia)</option>
                <option value="BC">BC (Broadcasting)</option>
                <option value="AV">AV (Audio Video)</option>
                <option value="MT">MT (Mekatronika)</option>
                <option value="AN">AN (Animasi)</option>
              </select>
              <div class="invalid-feedback">
                <?= $validation->getError('kompetensi_keahlian'); ?>
              </div>
            </div>
            </div>
            <!-- <div class="col-md-3"></div>   -->
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
              <!-- <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              <button type="reset" name="batal" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button> -->
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
