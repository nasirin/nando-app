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
                <form action="/booking/tambah" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kamar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kamar" required class="form-control col-md-7 col-xs-12">
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
                                    <input type="radio" checked="" value="Mingguan" id="optionsRadios1" name="optionsRadios">
                                    Mingguan
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="Bulanan" id="optionsRadios2" name="optionsRadios">
                                    Bulanan
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="Tahunan" id="optionsRadios2" name="optionsRadios">
                                    Tahunan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Check in <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" required class="form-control" name="checkin">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tambahan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <div class="input_fields_wrap">
                                <section class="row">
                                    <div class="col-md-5 col-5">
                                        <label>Tambahan</label>
                                        <input type="text" name="tambahan[]" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-5 col-5">
                                        <label>Biaya</label>
                                        <input type="number" min="0" name="biaya[]" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-2 col-2">
                                        <button class="add_field_button btn btn-sm btn-primary mb-2"><i class="fa fa-plus"></i> Add field</button>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="/booking" class="btn btn-primary">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>