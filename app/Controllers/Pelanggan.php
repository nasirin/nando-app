<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelanggan as ModelsPelanggan;

class Pelanggan extends BaseController
{
	protected $pelanggan;

	public function __construct()
	{
		$this->pelanggan = new ModelsPelanggan();
	}
	public function index()
	{
		$data['pelanggan'] = $this->pelanggan->findall();
		return view('pages/pelanggan/pelanggan', $data);
	}

	public function create()
	{
		return view('pages/pelanggan/tambah');
	}

	public function store()
	{
		$post = $this->request->getVar();
		// dd($post);
		$img = $this->request->getFile('ktp');

		if ($img->getError() == 4) {
			$imgName = null;
		} else {
			$imgName = $img->getRandomName();
			$img->move('assets/img/pelanggan/', $imgName);
		}

		$this->pelanggan->store($post, $imgName);

		if ($this->pelanggan->affectedRows()) {
			session()->setFlashdata('success', 'Data has been created');
		} else {
			session()->setFlashdata('error', 'Please Try again');
		}
		return redirect()->to('/pelanggan');
	}

	public function edit($id)
	{
		$data = [
			'pelanggan' => $this->pelanggan->find($id)
		];

		return view('pages/pelanggan/ubah', $data);
	}

	public function update($id)
	{
		$post = $this->request->getVar();
		$img = $this->request->getFile('ktp');
		$cekImg = $this->pelanggan->find($id);

		if ($img->getError() == 4) {
			$imgName = $post['ktpLama'];
		} else {
			if ($cekImg['img_ktp']) {
				unlink('assets/img/pelanggan/' . $post['ktpLama']);
				$imgName = $img->getRandomName();
				$img->move('assets/img/pelanggan/', $imgName);
			} else {
				$imgName = $img->getRandomName();
				$img->move('assets/img/pelanggan/', $imgName);
			}
		}

		$this->pelanggan->ubah($post, $imgName, $id);

		if ($this->pelanggan->affectedRows()) {
			session()->setFlashdata('success', 'Data has been updated');
		} else {
			session()->setFlashdata('error', 'Please Try again');
		}

		return redirect()->to('/pelanggan');
	}

	public function destroy($id)
	{
		// cari file
		$gambar = $this->pelanggan->find($id);
		if ($gambar['img_ktp']) {
			unlink('assets/img/pelanggan/' . $gambar['img_ktp']);
		}

		$this->pelanggan->delete($id);

		if ($this->pelanggan->affectedRows()) {
			session()->setFlashdata('success', 'Data has been deleted');
		} else {
			session()->setFlashdata('error', 'Please Try again');
		}
		return redirect()->to('/pelanggan');
	}
}
