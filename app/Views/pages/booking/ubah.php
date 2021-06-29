<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Booking Form</h3>
            </div>

        </div>
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form action="/booking/edit/<?= $booking['id_booking'] ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kamar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kamar" required class="form-control col-md-7 col-xs-12">
                                <option value="<?= $booking['id_kamar'] ?>" selected><?= $booking['nama_kamar'] ?> (selected)</option>
                                <option value="">--- Pilih Kamar ---</option>
                                <?php foreach ($kamar as $data) : ?>
                                    <option value="<?= $data['id_kamar'] ?>"><?= $data['nama_kamar'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pelanggan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="pelanggan" required class="form-control col-md-7 col-xs-12">
                                <option value="<?= $booking['id_pel'] ?>" selected><?= $booking['nama_pel'] ?> (selected)</option>
                                <option value="">--- Pilih Pelanggan ---</option>
                                <?php foreach ($pelanggan as $data) : ?>
                                    <option value="<?= $data['id_pel'] ?>"><?= $data['nama_pel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type Pembayaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <label>
                                    <input type="radio" <?= $booking['harga_per'] == 'Mingguan' ? 'checked' : '' ?> value="Mingguan" id="optionsRadios1" name="optionsRadios">
                                    Mingguan
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="Bulanan" id="optionsRadios2" name="optionsRadios" <?= $booking['harga_per'] == 'Bulanan' ? 'checked' : '' ?>>
                                    Bulanan
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="Tahunan" id="optionsRadios2" name="optionsRadios" <?= $booking['harga_per'] == 'Tahunan' ? 'checked' : '' ?>>
                                    Tahunan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Check in <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" required class="form-control" name="checkin" value="<?= $booking['check_in'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>