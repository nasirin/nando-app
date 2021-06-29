<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking as ModelsBooking;
use App\Models\DetailKamar;
use App\Models\Kamar;
use App\Models\Pelanggan;
use App\Models\Tambahan;

class Booking extends BaseController
{
	protected $booking;
	protected $kamar;
	protected $detailKamar;
	protected $pelanggan;

	public function __construct()
	{
		$this->booking = new ModelsBooking();
		// $this->tambahan = new Tambahan();
		$this->pelanggan = new Pelanggan();
		$this->kamar = new Kamar();
		$this->detailKamar = new DetailKamar();
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
		$kamar = $this->detailKamar->getBiaya($post);
		$this->booking->simpan($post, $kamar);
		$this->kamar->updateStatus($post['kamar']);
		session()->setFlashdata('success', 'Data has been created');
		return redirect()->to('/booking');
	}

	public function edit($id)
	{
		$data = [
			'booking' => $this->booking->get($id),
			'tambahan' => $this->tambahan->getAllData($id),
			'kamar' => $this->kamar->where('status', 'available')->findAll(),
			'pelanggan' => $this->pelanggan->findAll(),

		];

		return view('pages/booking/ubah', $data);
	}

	public function update($id)
	{
		$post = $this->request->getVar(); //get input
		$kamar = $this->detailKamar->getBiaya($post); // get data biaya kamar
		$booking = $this->booking->find($id); //get data booking by id

		if ($post['kamar'] != $booking['id_kamar']) {
			$this->kamar->updateStatusAvalable($booking['id_kamar']);
			$this->kamar->updateStatus($post['kamar']);
		}

		$this->booking->ubah($post, $kamar, $id);

		session()->setFlashdata('success', 'Data has been updated');
		return redirect()->to('/booking');
	}

	public function destroy($id)
	{
		$getKamar = $this->booking->find($id);
		$this->kamar->updateStatusAvalable($getKamar['id_kamar']);
		$this->booking->delete($id);
		session()->setFlashdata('success', 'Data has been deleted');
		return redirect()->to('/booking');
	}
}
