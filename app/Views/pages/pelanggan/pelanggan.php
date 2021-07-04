<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <?= $this->include('components/alert') ?>
        
        <div class="page-title">
            <div class="title_left">
                <h3>Data Pelanggan</h3>
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
                        <a href="pelanggan/tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Tgl lahir</th>
                                    <th>Telepon</th>
                                    <th>Pekerjaan</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pelanggan as $data) : ?>
                                    <tr>
                                        <td>
                                            <?php if ($data['img_ktp']) : ?>
                                                <img src="/assets/img/pelanggan/<?= $data['img_ktp'] ?>" class="img-circle" width="50">
                                            <?php else : ?>
                                                <img src="/assets/img/default-img.jpg" class="img-circle" width="50">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $data['nama_pel'] ?></td>
                                        <td><?= $data['jk'] ?></td>
                                        <td><?= $data['tgl_lahir'] ?></td>
                                        <td><?= $data['notelp'] ?></td>
                                        <td><?= $data['pekerjaan'] ?></td>
                                        <td>
                                            <form action="/pelanggan/delete/<?= $data['id_pel'] ?>" method="GET">
                                                <a href="/pelanggan/edit/<?= $data['id_pel'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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