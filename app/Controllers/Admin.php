<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin as ModelsAdmin;

class Admin extends BaseController
{
	protected $admin;

	public function __construct()
	{
		$this->admin = new ModelsAdmin();
	}

	public function index()
	{
		$data = [
			'admin' => $this->admin->get(),
		];

		return view('pages/admin/admin', $data);
	}

	public function create()
	{
		return view('pages/admin/tambah');
	}

	public function store()
	{
		$post = $this->request->getVar();
		// dd($post);
		$img = $this->request->getFile('img');
		$imgName = $img->getRandomName();
		$img->move('assets/img/admin/', $imgName);
		$this->admin->store($post, $imgName);

		return redirect()->to('/admin');
	}

	public function edit($id)
	{
		$data = [
			'admin' => $this->admin->get($id)
		];

		return view('pages/admin/ubah', $data);
	}

	public function update($id)
	{
		$post = $this->request->getVar();
		$img = $this->request->getFile('img');

		if ($img->getError() == 4) {
			$imgName = $post['imgLama'];
		} else {
			unlink('assets/img/admin/' . $post['imgLama']);
			$imgName = $img->getRandomName();
			$img->move('assets/img/admin/', $imgName);
		}

		$this->admin->ubah($post, $imgName, $id);

		return redirect()->to('/admin');
	}

	public function destroy($id)
	{
		// cari file
		$gambar = $this->admin->find($id);
		// hapus file
		unlink('assets/img/admin/' . $gambar['img_adm']);

		$this->admin->delete($id);

		session()->setFlashdata('success', 'Data berhasil di hapus');
		return redirect()->to('/admin');
	}
}
