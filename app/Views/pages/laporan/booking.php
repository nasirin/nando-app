<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/assets/src/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" rel="nofollow">

    <title>Laporan Booking</title>

    <style>
        /* @page {
            size: A4
        } */

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            /* border-collapse: collapse;
            width: 100%; */
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="sheet padding-10mm">
        <p><?= date('d F Y') ?></p>
        <h1>Laporan Booking</h1>
        <p class="text-center">Status : <?= ucwords($status) ?></p>
        <p class="text-center">Tanggal Bayar : <?= date('d F Y', strtotime($tglBayar)) ?></p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 50px;">NO.</th>
                    <th>PELANGGAN</th>
                    <th>KAMAR</th>
                    <th>WAKTU SEWA</th>
                    <th>DUE DATE</th>
                    <?php if ($status == 'telat') : ?>
                        <th>BIAYA</th>
                        <th>DENDA</th>
                        <th>TOTAL</th>
                    <?php endif; ?>
                    <?php if ($status != 'telat') : ?>
                        <th>TOTAL</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if ($booking) : ?>
                    <?php foreach ($booking as $data) : ?>
                        <tr>
                            <td style="width: 50px;"><?= $no++ ?></td>
                            <td><?= $data['nama_pel'] ?></td>
                            <td><?= $data['nama_kamar'] ?></td>
                            <td><?= $data['harga_per'] ?></td>
                            <td><?= date('d F Y', strtotime($data['due_date'])) ?></td>
                            <?php if ($status == 'telat') : ?>
                                <td><?= 'Rp ' . number_format($data['nominal'], 0, ',', '.') ?></td>
                                <td><?= 'Rp ' . number_format($data['denda'], 0, ',', '.') ?></td>
                                <td><?= 'Rp ' . number_format($data['denda'] + $data['nominal'], 0, ',', '.') ?></td>
                            <?php endif; ?>
                            <?php if ($status != 'telat') : ?>
                                <td><?= 'Rp ' . number_format($data['nominal'], 0, ',', '.') ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($status == 'telat') : ?>
                        <tr>
                            <th colspan="7">TOTAL</th>
                            <th><?= 'Rp ' . number_format($totalNominal['nominal'] + $totalDenda['denda'], 0, ',', '.') ?></th>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <th colspan="5">TOTAL</th>
                            <th><?= 'Rp ' . number_format($totalNominal['nominal'], 0, ',', '.') ?></th>
                        </tr>
                    <?php endif; ?>
                <?php else : ?>
                    <tr>
                        <p>Data Kosong</p>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>