<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<div class="container-fluid">
  
  <!-- Page Heading -->
<div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home" ></i></a></li>
            <li class="breadcrumb-item">SPP</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div>
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-outline card-outline-tabs">
        <!-- <div class="card-header">
          <h7 class="card-title">Tambah Data SPP</h7>
        </div> -->
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="<?= base_url('spp/tambah') ?>">
        <?= csrf_field(); ?>
          <div class="card-body">
            <div class="row">
              <!-- <div class="col-md-3"></div> -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ID SPP">ID SPP</label>
                  <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('id_spp')) ? 'is-invalid' : ''; ?>" id="id_spp" name="id_spp" value="<?= old('id_spp'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('id_spp'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <select class="custom-select <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" name="tahun" id="tahun">
                    <option disabled selected>Pilih Tahun</option>
                    <?php for ($i = 14; $i < 22; $i++) : ?>
                      <option value="20<?= $i ?>">20<?= $i; ?></option>
                    <?php endfor ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('tahun'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Nominal">Nominal</label>
                  <input type="text" autocomplete="off" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" id="nominal" name="nominal" value="<?= old('nominal'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('nominal'); ?>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-3"></div> -->
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