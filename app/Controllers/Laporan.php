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
			'tglBayar' => $post['tglBayar'],
			'totalNominal' => $this->payment->totalNominal($post),
			'totalDenda' => $this->payment->totalDenda($post)
		];

		// return view('pages/laporan/booking', $data);

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
			'no' => 1,
			'tahun' => $post['tahun'],
			'pemasukan1' => $this->payment->laporanTahunan('01', $post),
			'pemasukan2' => $this->payment->laporanTahunan('02', $post),
			'pemasukan3' => $this->payment->laporanTahunan('03', $post),
			'pemasukan4' => $this->payment->laporanTahunan('04', $post),
			'pemasukan5' => $this->payment->laporanTahunan('05', $post),
			'pemasukan6' => $this->payment->laporanTahunan('06', $post),
			'pemasukan7' => $this->payment->laporanTahunan('07', $post),
			'pemasukan8' => $this->payment->laporanTahunan('08', $post),
			'pemasukan9' => $this->payment->laporanTahunan('09', $post),
			'pemasukan10' => $this->payment->laporanTahunan('10', $post),
			'pemasukan11' => $this->payment->laporanTahunan('11', $post),
			'pemasukan12' => $this->payment->laporanTahunan('12', $post),
			'pengeluaran1' => $this->kebutuhan->laporanTahunan('01', $post),
			'pengeluaran2' => $this->kebutuhan->laporanTahunan('02', $post),
			'pengeluaran3' => $this->kebutuhan->laporanTahunan('03', $post),
			'pengeluaran4' => $this->kebutuhan->laporanTahunan('04', $post),
			'pengeluaran5' => $this->kebutuhan->laporanTahunan('05', $post),
			'pengeluaran6' => $this->kebutuhan->laporanTahunan('06', $post),
			'pengeluaran7' => $this->kebutuhan->laporanTahunan('07', $post),
			'pengeluaran8' => $this->kebutuhan->laporanTahunan('08', $post),
			'pengeluaran9' => $this->kebutuhan->laporanTahunan('09', $post),
			'pengeluaran10' => $this->kebutuhan->laporanTahunan('10', $post),
			'pengeluaran11' => $this->kebutuhan->laporanTahunan('11', $post),
			'pengeluaran12' => $this->kebutuhan->laporanTahunan('12', $post),

			'totalPemasukanTahunan' => $this->payment->totalPendapatanTahunan($post),
			'totalPengeluaranTahunan' => $this->kebutuhan->laporanTotalKebutuhan($post),
		];

		// dd($data);

		// return view('pages/laporan/keuangan_tahunan', $data);
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
