<?php

namespace App\Controllers;

use App\Models\Payment;

class Home extends BaseController
{
	protected $payment;

	public function __construct()
	{
		$this->payment = new Payment();
	}

	public function index()
	{
		return view('pages/dashboard');
	}
}
