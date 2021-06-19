<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar as ModelsKamar;

class Kamar extends BaseController
{
	protected $kamar;

	public function __construct()
	{
		$this->kamar = new ModelsKamar();
	}

	public function index()
	{
		$data['kamar'] = $this->kamar->orderBy('id', 'desc')->findAll();
		return view('pages/kamar/kamar', $data);
	}

	public function create()
	{
		return view('pages/kamar/tambah');
	}

	public function store()
	{
		$post = $this->request->getVar();
		$this->kamar->simpan($post);
		session()->setFlashdata('success', 'Data has been created');
		return redirect()->to('/kamar');
	}

	public function edit($id)
	{
		$data['kamar'] = $this->kamar->find($id);
		return view('pages/kamar/ubah', $data);
	}

	public function update($id)
	{
		$post = $this->request->getVar();
		$this->kamar->ubah($post, $id);
		session()->setFlashdata('success', 'Data has been updated');
		return redirect()->to('/kamar');
	}

	public function destroy($id)
	{
		$this->kamar->delete($id);
		session()->setFlashdata('success', 'Data has been deleted');
		return redirect()->to('/kamar');
	}
}
