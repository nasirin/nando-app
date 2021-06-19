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

		session()->setFlashdata('success', 'Data berhasil di hapus');
		return redirect()->to('/pelanggan');
	}
}
