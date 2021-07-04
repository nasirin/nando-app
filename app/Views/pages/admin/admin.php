<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <?= $this->include('components/alert') ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Data Admin</h3>
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
                        <a href="admin/tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admin as $data) : ?>
                                    <tr>
                                        <td>
                                            <img src="/assets/img/admin/<?= $data['img_adm'] ?>" class="img-circle" width="60">
                                        </td>
                                        <td><?= $data['nama_adm'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['level'] ?></td>
                                        <td>
                                            <form action="/admin/delete/<?= $data['id_adm'] ?>" method="GET">
                                                <?= csrf_field() ?>
                                                <a href="/admin/edit/<?= $data['id_adm'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
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