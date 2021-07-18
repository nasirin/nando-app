<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kebutuhan as ModelsKebutuhan;

class Kebutuhan extends BaseController
{
	protected $kebutuhan;

	public function __construct()
	{
		$this->kebutuhan = new ModelsKebutuhan();
	}

	public function index()
	{
		$data = [
			'kebutuhan' => $this->kebutuhan->findAll(),
			'no' => 1,
		];
		return view('pages/kebutuhan/kebutuhan', $data);
	}

	public function store()
	{
		$post = $this->request->getVar();
		// dd($post);
		$this->kebutuhan->store($post);
		if ($this->kebutuhan->affectedRows()) {
			session()->setFlashdata('success', 'Data has been created');
		} else {
			session()->setFlashdata('error', 'Please try again');
		}

		return redirect()->back();
	}

	public function update($id)
	{
		$post = $this->request->getVar();

		$this->kebutuhan->ubah($post, $id);
		if ($this->kebutuhan->affectedRows()) {
			session()->setFlashdata('success', 'Data has been Updated');
		} else {
			session()->setFlashdata('error', 'Please try again');
		}

		return redirect()->back();
	}

	public function destroy($id)
	{
		$this->kebutuhan->delete($id);
		if ($this->kebutuhan->affectedRows()) {
			session()->setFlashdata('success', 'Data has been deleted');
		} else {
			session()->setFlashdata('error', 'Please try again');
		}

		return redirect()->back();
	}
}
