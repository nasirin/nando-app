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
        <h1>Laporan Keuangan</h1>
        <h1>Periode <?= date('F Y', strtotime($tgl)) ?></h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 50px;">NO.</th>
                    <th>TANGGAL</th>
                    <th>KETERANGAN</th>
                    <th>PEMASUKAN</th>
                    <th>PENGELUARAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 50px;">1</td>
                    <td><?= date('d F Y') ?></td>
                    <td>Saldo Bulan Lalu (<?= date('F Y', strtotime($tglSaldoBulanLalu)) ?>)</td>
                    <td><?= 'Rp ' . number_format($saldoNominalBulanlalu['nominal'] + $saldoDendaBulanlalu['denda'], 0, ',', '.') ?></td>
                    <td></td>
                </tr>
                <?php foreach ($kebutuhan as $data) : ?>
                    <tr>
                        <td style="width: 50px;"><?= $no++ ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td><?= $data['kebutuhan'] ?></td>
                        <td></td>
                        <td><?= 'Rp ' . number_format($data['biaya'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="3">Total Saldo</th>
                    <th><?= 'Rp ' . number_format($saldoNominalBulanlalu['nominal'] + $saldoDendaBulanlalu['denda'], 0, ',', '.') ?></th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="4">Saldo Akhir</th>
                    <th><?= 'Rp ' . number_format($saldoAkhir, 0, ',', '.') ?></th>
                </tr>
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