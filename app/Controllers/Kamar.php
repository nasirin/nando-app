<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailKamar;
use App\Models\Kamar as ModelsKamar;

class Kamar extends BaseController
{
	protected $kamar;
	protected $detailKamar;

	public function __construct()
	{
		$this->kamar = new ModelsKamar();
		$this->detailKamar = new DetailKamar();
	}

	public function index()
	{
		$data['kamar'] = $this->kamar->orderBy('id_kamar', 'desc')->findAll();
		return view('pages/kamar/kamar', $data);
	}

	public function create()
	{
		return view('pages/kamar/tambah');
	}

	public function store()
	{
		$post = $this->request->getVar();
		// dd($post);
		$this->kamar->simpan($post);
		$data_kamar = $this->kamar->getLastById();
		$this->detailKamar->simpan($post, $data_kamar['id_kamar']);
		session()->setFlashdata('success', 'Data has been created');
		return redirect()->to('/kamar');
	}

	public function edit($id)
	{
		$data = [
			'kamar' => $this->kamar->find($id),
			'bulanan' => $this->detailKamar->where('id_kamar', $id)->where('waktu_sewa', 'Bulanan')->first(),
			'mingguan' => $this->detailKamar->where('id_kamar', $id)->where('waktu_sewa', 'Mingguan')->first(),
			'tahunan' => $this->detailKamar->where('id_kamar', $id)->where('waktu_sewa', 'Tahunan')->first()
		];
		// $bulanan = $this->detailKamar->where('id_kamar', $id)->where('waktu_sewa', 'Bulanan')->first();
		// dd($bulanan);
		return view('pages/kamar/ubah', $data);
	}

	public function update($id)
	{
		$post = $this->request->getVar();
		$this->kamar->ubah($post, $id);
		$this->detailKamar->ubah($post, $id);
		session()->setFlashdata('success', 'Data has been updated');
		return redirect()->to('/kamar');
	}

	public function destroy($id)
	{
		$this->kamar->delete($id);
		session()->setFlashdata('success', 'Data has been deleted');
		return redirect()->to('/kamar');
	}

	public function show($id)
	{
		$data['kamar'] = $this->detailKamar->get($id);
		$data['detail'] = $this->detailKamar->where('id_kamar', $id)->findAll();

		$test = $this->detailKamar->where('id_kamar', $id)->findAll();
		// dd($test);
		return view('pages/kamar/detail', $data);
	}
}
