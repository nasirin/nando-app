<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Kamar</h3>
            </div>

        </div>
        <div class="x_panel">
            <div class="x_content">
                <br />
                <form action="/kamar/tambah" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">luas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="luas" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <small>Bulanan</small> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="0" name="h.bulan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <small>Mingguan</small></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="0" name="h.minggu" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <small>Per 3 Bulan</small>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="0" name="h.3bulan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <small>Per 6 Bulan</small>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="0" name="h.6bulan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <small>Tahunan</small>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" min="0" name="h.tahunan" class="form-control col-md-7 col-xs-12">
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