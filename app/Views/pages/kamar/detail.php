<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Harga Kamar <?= $kamar['nama_kamar'] ?></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Waktu Sewa</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detail as $data) : ?>
                                    <tr>
                                        <td><?= $data['waktu_sewa'] ?></td>
                                        <td><?= 'Rp ' . number_format($data['biaya'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>