<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">

        <?= $this->include('components/alert') ?>

        <div class="page-title">
            <div class="title_left">
                <h3>Data kebutuhan</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_content">

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kebutuhan</th>
                                    <th>Biaya</th>
                                    <th>Tgl</th>
                                    <th>Note</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kebutuhan as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['kebutuhan'] ?></td>
                                        <td><?= 'Rp ' . number_format($data['biaya'], 0, ',', '.') ?></td>
                                        <td><?= date('d F Y', strtotime($data['tanggal'])) ?></td>
                                        <td><?= $data['note'] ?></td>
                                        <td>
                                            <a href="#kebutuhan<?= $data['id_kebutuhan'] ?>" data-toggle="modal" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/kebutuhan/hapus/<?= $data['id_kebutuhan'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
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
<?= $this->include('components/modal_kebutuhan') ?>
<?= $this->endSection() ?>