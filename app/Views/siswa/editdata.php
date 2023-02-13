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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline card-outline-tabs">
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?= base_url('siswa/ubahdata/' . $siswa['nisn']) ?>">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="NISN">NISN</label>
                                    <input value="<?= old('nisn', $siswa['nisn']) ?>" autocomplete="off" type="text" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="nisn" name="nisn" autofocus>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('nisn'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NIS">NIS</label>
                                    <input value="<?= old('nis', $siswa['nis']) ?>" autocomplete="off" type="text" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" id="nis" name="nis">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nis'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NamaLengkap">Nama Lengkap</label>
                                    <input value="<?= old('nama', $siswa['nama']) ?>" autocomplete="off" type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="NamaLengkap"  name="nama">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ID Kelas</label>
                                    <select class="custom-select  <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" name="id_kelas" id="id_kelas">
                                        <?php foreach ($kelas as $tampil) : ?>
                                            <option value="<?= $tampil['id_kelas']; ?>"><?= $tampil['nama_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kelas'); ?>
                                    </div>
                                    <input type="hidden" id="nama_kelas" name="nama_kelas" class="form-control" value="<?= old('nama_kelas', $siswa['nama_kelas']) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- <div class="form-group">
                            <label for="Id_Spp">ID SPP</label>
                            <input value="<?= old('id_spp', $siswa['id_spp']) ?>" type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="Id_Spp" placeholder="ID SPP" name="id_spp">
                            <div class="invalid-feedback">
                            <?= $validation->getError('id_spp'); ?>
                            </div>
                        </div> -->
                                <div class="form-group">
                                    <label>ID SPP</label>
                                    <select class="custom-select  <?= ($validation->hasError('id_spp')) ? 'is-invalid' : ''; ?>" name="id_spp" id="id_spp">
                                        <?php foreach ($spp as $tampil) : ?>
                                            <option value="<?= $tampil['id_spp']; ?>">ID: <?= $tampil['id_spp']; ?>, Nominal: <?= $tampil['nominal']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_spp'); ?>
                                    </div>
                                    <input type="hidden" id="nominal" name="nominal" class="form-control" value="<?= old('nominal', $siswa['nominal']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="No_Telp">No. Telepon</label>
                                    <input value="<?= old('no_telp', $siswa['no_telp']) ?>" autocomplete="off" type="text" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="No_Telp" name="no_telp">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telp'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Alamat">Alamat</label>
                                    <textarea style="height: 126px" autocomplete="off" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat"><?= $siswa['alamat']; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
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
                            <a href="<?= base_url('siswa/index') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
                                <span class="icon">
                                    <i class="las la-times" style="font-size: 18px"></i>
                                </span>
                                <span class="text">Batal</span>
                            </a>
                            <!-- <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <a href="<?= base_url('siswa/index') ?>" type="cancel" name="batal" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a> -->
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