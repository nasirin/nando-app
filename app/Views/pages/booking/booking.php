<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Booking</h3>
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
                        <a href="/booking/tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus-curcle"></i> Tambah</a>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Kamar</th>
                                    <th>Pelanggan</th>
                                    <th>Waktu sewa</th>
                                    <th>Due Date </th>
                                    <th>Biaya</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($booking as $data) : ?>
                                    <tr>
                                        <td><?= $data['nama_kamar'] ?></td>
                                        <td><?= $data['nama_pel'] ?></td>
                                        <td><?= $data['harga_per'] ?></td>
                                        <td><?= $data['due_date_booking'] ?></td>
                                        <td><?= 'Rp ' . number_format($data['total'], 0, ',', '.') ?></td>
                                        <td>
                                            <form action="/booking/delete/<?= $data['id_booking'] ?>" method="post">
                                                <?= csrf_field() ?>
                                                <a href="/invoice/<?= $data['id_booking'] ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                <?php if ($data['check_out'] == null) : ?>
                                                    <a href="/booking/edit/<?= $data['id_booking'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                <?php endif; ?>
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