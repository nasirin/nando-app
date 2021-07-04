<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <?= $this->include('components/alert') ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Data Kamar</h3>
            </div>

            <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/kamar/tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus-curcle"></i> Tambah</a>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kamar</th>
                                    <th>Luas</th>
                                    <th>Status</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kamar as $data) : ?>
                                    <tr>
                                        <td><?= $data['nama_kamar'] ?></td>
                                        <td><?= $data['luas'] ?></td>
                                        <td><?= $data['status'] ?></td>
                                        <td>
                                            <form action="/kamar/delete/<?= $data['id_kamar'] ?>" method="GET">
                                                <?= csrf_field() ?>
                                                <a href="/kamar/show/<?= $data['id_kamar'] ?>" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-dollar"></i></a>
                                                <a href="/kamar/edit/<?= $data['id_kamar'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
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
<?= $this->endSection() ?>