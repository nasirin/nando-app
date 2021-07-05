<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\Kebutuhan;
use App\Models\Payment;
use TCPDF;

class Laporan extends BaseController
{
	protected $payment;
	protected $booking;
	protected $kebutuhan;

	public function __construct()
	{
		$this->payment = new Payment();
		$this->booking = new Booking();
		$this->kebutuhan = new Kebutuhan();
	}

	public function booking()
	{
		$post = $this->request->getVar();
		$data = [
			'no' => 1,
			'booking' => $this->payment->laporan($post),
			'status' => $post['status'],
			'totalNominal' => $this->payment->totalNominal($post),
			'totalDenda' => $this->payment->totalDenda($post)
		];

		$html = view('pages/laporan/booking', $data);

		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dpavillon');
		$pdf->SetTitle('Laporan-Booking-' . $post['status']);
		$pdf->SetSubject('Booking-' . $post['status']);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('Laporan Booking' . ' ' . $post['status'] . '.pdf', 'I');
	}

	public function keuangan()
	{
		$post = $this->request->getVar();

		$tgl1    = $post['date'];
		$tgl2    = date('F Y', strtotime('-1 month', strtotime($tgl1)));

		$saldoNominal = $this->payment->saldoNominalBulanLalu($post);
		$saldoDenda = $this->payment->saldoDendaBulanLalu($post);
		$totalKebutuhan = $this->kebutuhan->totalKebutuhan($post);

		$data = [
			'no' => 2,
			'tgl' => $post['date'],
			'tglSaldoBulanLalu' => $tgl2,
			'saldoNominalBulanlalu' => $saldoNominal,
			'saldoDendaBulanlalu' => $saldoDenda,
			'kebutuhan' => $this->kebutuhan->laporan($post),
			'saldoAkhir' => intval(($saldoNominal['nominal'] + $saldoDenda['denda']) - $totalKebutuhan['biaya'])
		];
		// return view('pages/laporan/keuangan', $data);

		$html = view('pages/laporan/keuangan', $data);

		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dpavillon');
		$pdf->SetTitle('Laporan-Keuangan');
		$pdf->SetSubject('Lap-Keuangan');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('Laporan Keuangan' . ' Periode ' . date('F Y', strtotime($post['date'])) . '.pdf', 'I');
	}
}
