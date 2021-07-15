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

	public function keuanganTahunan()
	{
		$post = $this->request->getVar();

		$data = [
			'noPemasukan' => 1,
			'noPengeluaran' => 1,
			'tahun' => $post['tahun'],
			'pendapatanKos' => $this->payment->pendapatanKosTahunan($post),
			'totalPendapatanKos' => $this->payment->totalPendapatanTahunan($post),
			'pengeluaran' => $this->kebutuhan->laporanTahunan($post),
			'totalPengeluaranKos' => $this->kebutuhan->laporanTotalKebutuhan($post),
		];

		$html = view('pages/laporan/keuangan_tahunan', $data);

		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dpavillon');
		$pdf->SetTitle('Laporan-Keuangan-Tahunan' . $post['tahun']);
		$pdf->SetSubject('Keuangan-Tahunan' . $post['tahun']);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('Laporan Keuangan Tahunan' . ' ' . $post['tahun'] . '.pdf', 'I');
	}

	public function keuanganBulanan()
	{
		$post = $this->request->getVar();

		$data = [
			'no' => 2,
			'date' => $post['date'],
			'pendapatanKos' => $this->payment->pendapatanKos($post),
			'pengeluaran' => $this->kebutuhan->laporan($post),
			'totalPengeluaran' => $this->kebutuhan->totalKebutuhan($post)
		];

		$html = view('pages/laporan/keuangan_bulanan', $data);

		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dpavillon');
		$pdf->SetTitle('Laporan-Keuangan-Bulanan' . $post['date']);
		$pdf->SetSubject('Keuangan-Bulanan' . $post['date']);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output('Laporan Keuangan Bulanan' . ' ' . $post['date'] . '.pdf', 'I');
	}
}
