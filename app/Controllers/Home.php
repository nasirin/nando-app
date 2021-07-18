<?php

namespace App\Controllers;

use App\Models\Kebutuhan;
use App\Models\Payment;

class Home extends BaseController
{
	protected $payment;
	protected $kebutuhan;

	public function __construct()
	{
		$this->payment = new Payment();
		$this->kebutuhan = new Kebutuhan();
	}

	public function index()
	{
		$data = [
			'kebutuhan' => $this->kebutuhan->findAll()
		];
		return view('pages/dashboard', $data);
	}
}
