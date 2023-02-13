<link href="<?= base_url() ?>/siswastyle/style.css" rel="stylesheet">
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-7">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h7 class="card-title">Form Pembayaran SPP</h7>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?= base_url('pembayaran/bayarspp/' . $pay['id_pembayaran']) ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_pembayaran" name="id_pembayaran" value="<?= old('id_pembayaran', $pay['id_pembayaran']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_pembayaran'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="<?= old('id_petugas', $pay['id_petugas']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_petugas'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nisn" name="nisn" value="<?= old('nisn', $pay['nisn']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nisn'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?= old('tgl_bayar', $pay['tgl_bayar']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tgl_bayar'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="bulan_dibayar" name="bulan_dibayar" value="<?= old('bulan_dibayar', $pay['bulan_dibayar']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bulan_dibayar'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tahun_dibayar" name="tahun_dibayar" value="<?= old('tahun_dibayar', $pay['tahun_dibayar']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('tahun_dibayar'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_spp" name="id_spp" value="<?= old('id_spp', $pay['id_spp']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_spp'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Jumlah Bayar">Jumlah Bayar</label>
                            <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" value="<?= old('jumlah_bayar', $pay['jumlah_bayar']) ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah_bayar'); ?>
                            </div>
                            <input type="text" class="form-control" id="jumlah_dibayar" name="jumlah_dibayar" value="<?= old('jumlah_bayar', $pay['jumlah_bayar']) ?>">
                            <input type="text" class="form-control" id="status" name="status">
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('pembayaran/index') ?>" type="batal" name="batal" class="btn btn-danger">Batal</a>
                        </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>