<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking as ModelsBooking;
use App\Models\Kamar;
use App\Models\Pelanggan;
use App\Models\Tambahan;

class Booking extends BaseController
{
	protected $booking;
	protected $tambahan;
	protected $kamar;
	protected $pelanggan;

	public function __construct()
	{
		$this->booking = new ModelsBooking();
		$this->tambahan = new Tambahan();
		$this->pelanggan = new Pelanggan();
		$this->kamar = new Kamar();
	}

	public function index()
	{
		$data['booking'] = $this->booking->get();
		return view('pages/booking/booking', $data);
	}

	public function create()
	{
		$data = [
			'kamar' => $this->kamar->where('status', 'available')->findAll(),
			'pelanggan' => $this->pelanggan->findAll(),
		];
		return view('pages/booking/tambah', $data);
	}

	public function store()
	{
		$post = $this->request->getVar();
		$this->booking->simpan($post);
		$this->kamar->updateStatus($post['kamar']);
		$getlast = $this->booking->getLast();
		foreach ($post['tambahan'] as $value) {
			if ($value) {
				$this->tambahan->simpan($post, $getlast['id']);
			}
		}
		session()->setFlashdata('success', 'Data has been created');
		return redirect()->to('/booking');
	}
}
