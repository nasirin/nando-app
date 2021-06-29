<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;

class Auth extends BaseController
{
	protected $admin;

	public function __construct()
	{
		$this->admin = new Admin();
	}

	public function index()
	{
		return view('pages/login');
	}

	public function login()
	{
		$post = $this->request->getVar();

		$admin = $this->admin->login($post);
		// dd($admin);
		$data = [
			'id' => $admin['id_adm'],
			'nama' => $admin['nama_adm'],
			'level' => $admin['level'],
			'img' => $admin['img_adm'],
		];

		session()->set($data);
		return redirect()->to('/');
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth');
	}
}
