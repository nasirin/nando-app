<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">

                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12 invoice-header">
                                    <h1>
                                        <i class="fa fa-globe"></i> Invoice.
                                        <small class="pull-right">Date: <?= date('d/m/Y') ?></small>
                                    </h1>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">
                                    From
                                    <address>
                                        <strong>Nando Kos</strong>
                                        <br>Alamat Nando Kos
                                        <br>Phone: +62 821-3772-6260
                                        <br>Email: nando@gmail.com
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    To
                                    <address>
                                        <strong><?= $invoice['nama_pel'] ?></strong>
                                        <br><?= $invoice['alamat'] ?>
                                        <br>Gender : <?= $invoice['jk'] ?>
                                        <br>Phone : <?= $invoice['notelp'] ?>
                                        <br>Birthday : <?= $invoice['tgl_lahir'] ?>
                                        <br>Work : <?= $invoice['pekerjaan'] ?>
                                    </address>
                                </div>
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-xs-12 table">
                                    <p>Data Booking</p>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Room</th>
                                                <th>Large</th>
                                                <th>Rental time</th>
                                                <th>Check in</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($booking as $data) : ?>
                                                <tr>
                                                    <td><?= $data['nama_kamar'] ?></td>
                                                    <td><?= $data['luas'] ?></td>
                                                    <td><?= $data['harga_per'] ?></td>
                                                    <td><?= $data['check_in'] ?></td>
                                                    <td><?= 'Rp' . number_format($data['total'], 0, ',', '.') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-xs-12 table">
                                    <p>Billing</p>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Bill</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-6">
                                    <p class="lead">Note:</p>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; height: 200px;">

                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Detail Payment</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>$250.30</td>
                                                </tr>
                                                <tr>
                                                    <th>Denda</th>
                                                    <td>$10.34</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>$265.24</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                    <button class="btn btn-info pull-right"><i class="fa fa-eye"></i> History</button>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>