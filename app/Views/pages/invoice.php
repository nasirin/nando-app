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
                                                    <td><?= date('d F Y', strtotime($data['check_in'])) ?></td>
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
                                            <?php if (!empty($payment)) : ?>
                                                <?php $no = 1;
                                                foreach ($payment as $data) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= date('d F Y', strtotime($data['tgl_bayar'])) ?></td>
                                                        <td><?= 'Rp ' . number_format($data['nominal'], 0, ',', '.') ?></td>
                                                        <td><?= date('d F Y', strtotime($data['due_date'])) ?></td>
                                                        <td><?= $data['status'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
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
                                                    <td><?= 'Rp ' . number_format($tagihan['nominal'], 0, ',', '.')  ?? '' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Denda</th>
                                                    <td><?= 'Rp ' . number_format($denda['denda'], 0, ',', '.') ?? '' ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <?php if ($denda) : ?>
                                                        <td><?= 'Rp ' . number_format($tagihan['nominal'] + $denda['denda'], 0, ',', '.')  ?></td>
                                                    <?php else : ?>
                                                        <td><?= 'Rp ' . number_format($tagihan['nominal'], 0, ',', '.')  ?></td>
                                                    <?php endif; ?>
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
                                    <?php if ($statusPayment['status'] != 'checkout') : ?>
                                        <form action="/invoice/<?= $invoice['id_booking'] ?>" method="post" class="d-inline pull-right">
                                            <?= csrf_field() ?>
                                            <button type="submit" onclick="return confirm('Submit Pembayaran?')" class="btn btn-success"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                        </form>
                                        <a href="/booking/checkout/<?= $invoice['id_booking'] ?>" onclick="return confirm('Ingin Check Out?')" class="btn btn-danger pull-right"><i class="fas fa-door-open"></i> Check Out</a>
                                    <?php endif; ?>

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