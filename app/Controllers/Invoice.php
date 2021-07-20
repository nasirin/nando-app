<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\Kebutuhan;
use App\Models\Laporan;
use App\Models\Payment;
use DateTime;

class Invoice extends BaseController
{
	protected $booking;
	protected $payment;
	protected $kebutuhan;

	public function __construct()
	{
		$this->booking = new Booking();
		$this->payment = new Payment();
		$this->kebutuhan = new Kebutuhan();
	}
	public function index($id)
	{
		$this->cekDueDate($id);

		$data = [
			'invoice' => $this->booking->get($id),
			'booking' => $this->booking->invoice($id),
			'payment' => $this->payment->get($id),
			'tagihan' => $this->payment->nominal($id),
			'denda' => $this->payment->denda($id),
			'statusPayment' => $this->payment->where('id_booking', $id)->first(),
		];

		return view('pages/invoice', $data);
	}

	public function cekDueDate($id)
	{
		$pay = $this->payment->getDate($id);
		$due = strtotime(date('ymd', strtotime($pay['due_date'])));
		$tgl2 =  strtotime(date('ymd', strtotime('+1 days', strtotime($pay['due_date']))));

		if ($due > $tgl2) {
			$this->payment->updateStatusTelat($pay);
		}
	}

	public function payment($id)
	{
		$booking = $this->booking->get($id);
		$last = $this->payment->getLastById($id);

		$this->payment->updateStatusSuccess($last);
		$this->payment->bayar($booking, $last);
		$last2 = $this->payment->getLastById($id);
		$this->booking->dueDateUpdate($last2);

		$totalPayment = $this->payment->pendapatanKosTahunan($last);

		// $getLaporan = $this->laporan->where('bulan', $last['bulan'])->where('print', date('Y', strtotime($totalPayment['tgl_bayar'])))->get()->getRowArray();
		// dd($totalPayment);
		$this->laporan->simpanKebutuhan($totalPayment);

		session()->setFlashdata('success', 'Payment success');
		return redirect()->to('/invoice/' . $last['id_booking']);
	}
}
