<?php

namespace App\Models;

use CodeIgniter\Model;

class Kamar extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'kamars';
	protected $primaryKey           = 'id_kamar';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_kamar', 'luas', 'status'];

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

	public function simpan($post)
	{
		$data = [
			'nama_kamar' => $post['nama'],
			'luas' => $post['luas'],
			'status' => 'available',
		];

		$this->insert($data);
	}

	public function ubah($post, $id)
	{
		$data = [
			'nama_kamar' => $post['nama'],
			'luas' => $post['luas'],
			// 'status' => 'available',
		];

		$this->update($id, $data);
	}

	public function updateStatus($post)
	{
		$data = [
			'status' => 'booked'
		];
		$this->update($post, $data);
	}

	public function updateStatusAvalable($post)
	{
		$data = [
			'status' => 'available'
		];
		$this->update($post, $data);
	}

	public function getLastById()
	{
		return $this->db->table($this->table)->orderBy($this->primaryKey, 'desc')->get()->getRowArray();
	}
}
