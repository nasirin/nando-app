<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;

class Invoice extends BaseController
{
	protected $booking;

	public function __construct()
	{
		$this->booking = new Booking();
	}
	public function index($id)
	{
		$data = [
			'invoice' => $this->booking->get($id),
			'booking' => $this->booking->invoice($id)
		];

		return view('pages/invoice', $data);
	}
}
