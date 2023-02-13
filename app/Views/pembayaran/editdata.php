<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="page-breadcrumb">
    <ol class="breadcrumb">
      <h1 class="breadcrumb-title"><?= $title; ?></h1>
      <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>"><i class="las la-home"></i></a></li>
      <li class="breadcrumb-item">Pembayaran</li>
      <li class="breadcrumb-item"><?= $title; ?></li>
    </ol>
  </div>
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-outline card-outline-tabs">
        <!-- <div class="card-header">
          <h7 class="card-title">Edit Data Pembayaran SPP</h7>
        </div> -->
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="<?= base_url('pembayaran/ubahdata/' . $pembayaran['id_pembayaran']) ?>">
          <?= csrf_field(); ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="id_pembayaran">ID Pembayaran</label>
                  <input value="<?= old('id_pembayaran', $pembayaran['id_pembayaran']) ?>" type="text" class="form-control <?= ($validation->hasError('id_pembayaran')) ? 'is-invalid' : ''; ?>" id="id_pembayaran" placeholder="ID Pembayaran" name="id_pembayaran" autofocus>
                  <div class="invalid-feedback">
                    <?= $validation->getError('id_pembayaran'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Petugas</label>
                  <select class="custom-select  <?= ($validation->hasError('id_petugas')) ? 'is-invalid' : ''; ?>" name="id_petugas" id="id_petugas">
                    <option selected disabled>Pilih Petugas</option>
                    <?php foreach ($petugas as $tampil) : ?>
                      <option value="<?= $tampil['id_petugas']; ?>"><?= $tampil['nama_petugas']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('id_petugas'); ?>
                  </div>
                  <input type="hidden" name="nama_petugas" id="nama_petugas" class="form-control" value="<?= old('nama_petugas', $pembayaran['nama_petugas']); ?>">
                </div>
                <div class="form-group">
                  <label>NISN</label>
                  <select class="custom-select  <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" name="nisn" id="nisn">
                    <option selected disabled>Pilih NISN</option>
                    <?php foreach ($siswa as $tampil) : ?>
                      <option value="<?= $tampil['nisn']; ?>"><?= $tampil['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Nama">Nama</label>
                  <input autocomplete="off" type="hidden" name="nama" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama', $pembayaran['nama']); ?>" readonly>
                  <input autocomplete="off" type="text" id="nisn2" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nisn', $pembayaran['nisn']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= $validation->getError('nisn'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Kelas">Kelas</label>
                  <input autocomplete="off" type="text" class="form-control <?= ($validation->hasError('nama_kelas')) ? 'is-invalid' : ''; ?>" id="nama_kelas" name="nama_kelas" value="<?= old('nama_kelas', $pembayaran['nama_kelas']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= $validation->getError('nama_kelas'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Tanggal Bayar">Tanggal Bayar</label>
                  <input autocomplete="off" type="text" class="form-control <?= ($validation->hasError('tgl_bayar')) ? 'is-invalid' : ''; ?>" id="tgl_bayar" name="tgl_bayar" value="<?= old('tgl_bayar', $pembayaran['tgl_bayar']) ?>" readonly>
                  <!-- <input type="date" class="form-control <?= ($validation->hasError('tgl_bayar')) ? 'is-invalid' : ''; ?>" id="tgl_bayar" name="tgl_bayar" value="<?= old('tgl_bayar', $pembayaran['tgl_bayar']) ?>"> -->
                  <div class="invalid-feedback">
                    <?= $validation->getError('tgl_bayar'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Bulan Dibayar</label>
                  <select class="custom-select <?= ($validation->hasError('bulan_dibayar')) ? 'is-invalid' : ''; ?>" name="bulan_dibayar" id="bulan_dibayar">
                    <option disabled selected>Pilih Bulan Dibayar</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= $validation->getError('bulan_dibayar'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Tahun Dibayar</label>
                  <!-- <select class="custom-select <?= ($validation->hasError('tahun_dibayar')) ? 'is-invalid' : ''; ?>" name="tahun_dibayar" id="tahun_dibayar">
                    <option disabled selected>Pilih Tahun Tahun Dibayar</option>
                    <?php for ($i = 14; $i < 22; $i++) : ?>
                      <option value="20<?= $i ?>">20<?= $i; ?></option>
                    <?php endfor ?>
                  </select> -->
                  <input type="text" id="tahun_dibayar" name="tahun_dibayar" class="form-control <?= ($validation->hasError('tahun_dibayar')) ? 'is-invalid' : ''; ?>" autocomplete="off" value="<?= old('tahun_dibayar', $pembayaran['tahun_dibayar']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= $validation->getError('tahun_dibayar'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>ID SPP</label>
                  <!-- <select class="custom-select  <?= ($validation->hasError('id_spp')) ? 'is-invalid' : ''; ?>" name="id_spp" id="id_spp">
                    <option selected disabled>Pilih ID SPP</option>

                    <?php foreach ($id_spp as $row) : ?>
                      <option value="<?= $row['id_spp']; ?>"><?= $row['id_spp']; ?></option>
                    <?php endforeach; ?>
                  </select> -->
                  <input type="text" id="idnespp" class="form-control <?= ($validation->hasError('id_spp')) ? 'is-invalid' : ''; ?>" id="id_spp" autocomplete="off" name="id_spp" value="<?= old('id_spp', $pembayaran['id_spp']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= $validation->getError('id_spp'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Jumlah Bayar">Jumlah Bayar</label>
                  <input type="text" id="jumlahDibayar" class="form-control <?= ($validation->hasError('jumlah_bayar')) ? 'is-invalid' : ''; ?>" id="jumlah_bayar" placeholder="Jumlah Bayar" name="jumlah_bayar" value="<?= old('jumlah_bayar', $pembayaran['jumlah_bayar']) ?>" readonly>
                  <div class="invalid-feedback">
                    <?= $validation->getError('jumlah_bayar'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer px-0">
              <!-- <div class="col-sm-8 col-lg-7 mt-2"> -->
              <button type="submit" name="simpan" class="btn btn-primary btn-icon-split mr-1">
                <span class="icon">
                  <i class="las la-save" style="font-size: 18px"></i>
                </span>
                <span class="text">Simpan</span>
              </button>
              <a href="<?= base_url('pembayaran/index') ?>" type="cancel" name="batal" class="btn btn-danger btn-icon-split">
                <span class="icon">
                  <i class="las la-times" style="font-size: 18px"></i>
                </span>
                <span class="text">Batal</span>
              </a>
                <!-- <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <a href="<?= base_url('pembayaran/index') ?>" type="cancel" name="batal" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a> -->
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