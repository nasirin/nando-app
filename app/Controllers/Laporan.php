<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\Payment;
use TCPDF;

class Laporan extends BaseController
{
	protected $payment;
	protected $booking;
	public function __construct()
	{
		$this->payment = new Payment();
		$this->booking = new Booking();
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
		// $booking = $this->payment->totalDenda($post);

		// dd($booking);

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

	public function pengeluaran()
	{
	}

	public function pemasukan()
	{
	}
}
