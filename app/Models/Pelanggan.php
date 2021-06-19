<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'pelanggans';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_pel', 'notelp', 'alamat', 'tgl_lahir', 'pekerjaan', 'jk', 'img_ktp'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function store($post, $img)
	{
		$data = [
			'nama_pel' => $post['nama'],
			'notelp' => $post['notelp'],
			'alamat' => $post['alamat'],
			'tgl_lahir' => $post['lahir'],
			'pekerjaan' => $post['pekerjaan'],
			'jk' => $post['gender'],
			'img_ktp' => $img
		];

		$this->insert($data);
	}

	public function ubah($post, $img, $id)
	{
		$data = [
			'nama_pel' => $post['nama'],
			'notelp' => $post['notelp'],
			'alamat' => $post['alamat'],
			'tgl_lahir' => $post['lahir'],
			'pekerjaan' => $post['pekerjaan'],
			'jk' => $post['gender'],
			'img_ktp' => $img
		];

		$this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
	}
}
