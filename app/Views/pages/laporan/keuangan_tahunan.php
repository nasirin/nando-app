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
        <p>Print out : <?= date('d F Y') ?></p>
        <h1>LAPORAN KEUANGAN</h1>
        <h1 style="margin-bottom: 100px;">TAHUNAN <?= $tahun ?></h1>

        <table class="table table-bordered table-sm" style="margin-bottom: 100px;">
            <thead>
                <tr>
                    <th style="width: 50px;">NO.</th>
                    <th>Bulan</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pendapatanKos as $data) : ?>
                    <tr>
                        <td style="width: 50px;"><?= $no++ ?></td>
                        <td><?= date('F', strtotime($data['tgl_bayar'])) ?></td>
                        <td><?= 'Rp ' . number_format($data['nominal'] + $data['denda'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <td><?= 'Rp ' . number_format($totalPendapatanKos['nominal'] + $totalPendapatanKos['denda'], 0, ',', '.') ?></td>
                </tr>
            </tfoot>
        </table>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>