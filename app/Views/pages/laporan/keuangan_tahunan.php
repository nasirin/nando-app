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
                    <th>BULAN</th>
                    <th>PEMASUKAN</th>
                    <th>PENGELUARAN</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 50px;">1</td>
                    <td>Januari</td>
                    <td><?= $pemasukan1 ? 'Rp ' . number_format($pemasukan1['nominal'] + $pemasukan1['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran1['biaya'] ? 'Rp ' . number_format($pengeluaran1['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan1['nominal'] + $pemasukan1['denda'] - $pengeluaran1['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">2</td>
                    <td>Februari</td>
                    <td><?= $pemasukan2 ? 'Rp ' . number_format($pemasukan2['nominal'] + $pemasukan2['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran2['biaya'] ? 'Rp ' . number_format($pengeluaran2['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan2['nominal'] + $pemasukan2['denda'] - $pengeluaran2['biaya'], 0, ',', '.') ?></td>

                </tr>
                <tr>
                    <td style="width: 50px;">3</td>
                    <td>Maret</td>
                    <td><?= $pemasukan3 ? 'Rp ' . number_format($pemasukan3['nominal'] + $pemasukan3['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran3['biaya'] ? 'Rp ' . number_format($pengeluaran3['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan3['nominal'] + $pemasukan3['denda'] - $pengeluaran3['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">4</td>
                    <td>April</td>
                    <td><?= $pemasukan4 ? 'Rp ' . number_format($pemasukan4['nominal'] + $pemasukan4['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran4['biaya'] ? 'Rp ' . number_format($pengeluaran4['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan4['nominal'] + $pemasukan4['denda'] - $pengeluaran4['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">5</td>
                    <td>Mei</td>
                    <td><?= $pemasukan5 ? 'Rp ' . number_format($pemasukan5['nominal'] + $pemasukan5['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran5['biaya'] ? 'Rp ' . number_format($pengeluaran5['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan5['nominal'] + $pemasukan5['denda'] - $pengeluaran5['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">6</td>
                    <td>Juni</td>
                    <td><?= $pemasukan6 ? 'Rp ' . number_format($pemasukan6['nominal'] + $pemasukan6['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran6['biaya'] ? 'Rp ' . number_format($pengeluaran6['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan6['nominal'] + $pemasukan6['denda'] - $pengeluaran6['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">7</td>
                    <td>Juli</td>
                    <td><?= $pemasukan7 ? 'Rp ' . number_format($pemasukan7['nominal'] + $pemasukan7['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran7['biaya'] ? 'Rp ' . number_format($pengeluaran7['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan7['nominal'] + $pemasukan7['denda'] - $pengeluaran7['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">8</td>
                    <td>Agustus</td>
                    <td><?= $pemasukan8 ? 'Rp ' . number_format($pemasukan8['nominal'] + $pemasukan8['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran8['biaya'] ? 'Rp ' . number_format($pengeluaran8['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan8['nominal'] + $pemasukan8['denda'] - $pengeluaran8['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">9</td>
                    <td>September</td>
                    <td><?= $pemasukan9 ? 'Rp ' . number_format($pemasukan9['nominal'] + $pemasukan9['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran9['biaya'] ? 'Rp ' . number_format($pengeluaran9['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan9['nominal'] + $pemasukan9['denda'] - $pengeluaran9['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">10</td>
                    <td>Oktober</td>
                    <td><?= $pemasukan10 ? 'Rp ' . number_format($pemasukan10['nominal'] + $pemasukan10['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran10['biaya'] ? 'Rp ' . number_format($pengeluaran10['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan10['nominal'] + $pemasukan10['denda'] - $pengeluaran10['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">11</td>
                    <td>November</td>
                    <td><?= $pemasukan11 ? 'Rp ' . number_format($pemasukan11['nominal'] + $pemasukan11['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran11['biaya'] ? 'Rp ' . number_format($pengeluaran11['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan11['nominal'] + $pemasukan11['denda'] - $pengeluaran11['biaya'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="width: 50px;">12</td>
                    <td>Desember</td>
                    <td><?= $pemasukan12 ? 'Rp ' . number_format($pemasukan12['nominal'] + $pemasukan12['denda'], 0, ',', '.') : 'Rp .0' ?></td>
                    <td><?= $pengeluaran12['biaya'] ? 'Rp ' . number_format($pengeluaran12['biaya'], 0, ',', '.')  : 'Rp 0' ?></td>
                    <td><?= 'Rp ' . number_format($pemasukan12['nominal'] + $pemasukan12['denda'] - $pengeluaran12['biaya'], 0, ',', '.') ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">TOTAL PENDAPATAN</th>
                    <th><?= 'Rp ' . number_format($totalPemasukanTahunan['nominal'] + $totalPemasukanTahunan['denda'] - $totalPengeluaranTahunan['biaya'], 0, ',', '.') ?></th>
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