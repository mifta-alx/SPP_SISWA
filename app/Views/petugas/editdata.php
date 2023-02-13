<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <h1 class="breadcrumb-title"><?= $title; ?></h1>
            <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
            <li class="breadcrumb-item">Petugas</li>
            <li class="breadcrumb-item"><?= $title; ?></li>
        </ol>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline card-outline-tabs">
                <!-- <div class="card-header">
                    <h7 class="card-title">Edit Data Petugas</h7>
                </div> -->
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?= base_url('petugas/ubahdata/' . $petugas['id_petugas']) ?>">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ID_Petugas">Id Petugas</label>
                                    <input value="<?= old('id_petugas', $petugas['id_petugas']) ?>" autocomplete="off" type="text" class="form-control <?= ($validation->hasError('id_petugas')) ? 'is-invalid' : ''; ?>" id="id_petugas" name="id_petugas" autofocus>
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('id_petugas'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input value="<?= old('username', $petugas['username']) ?>" autocomplete="off" type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" autocomplete="off" name="password" value="<?= old('password', $petugas['password']) ?>">
                                        <div class="input-group-append">
                                            <button class="input-group-text eye" type="button" tabindex="-1"><i style="margin-right: 5px" class="fa fa-eye mata" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Nama Petugas">Nama Petugas</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_petugas')) ? 'is-invalid' : ''; ?>" id="nama_petugas" autocomplete="off" name="nama_petugas" value="<?= old('nama_petugas', $petugas['nama_petugas']) ?>"">
              <div class=" invalid-feedback">
                                    <?= $validation->getError('nama_petugas'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="custom-select  <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" name="level" id="level">
                                    <option disabled selected>Pilih Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('level'); ?>
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
                        <a href="<?= base_url('petugas/index') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
                            <span class="icon">
                                <i class="las la-times" style="font-size: 18px"></i>
                            </span>
                            <span class="text">Batal</span>
                        </a>
                        <!-- <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('petugas/index') ?>" type="cancel" name="batal" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a> -->
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