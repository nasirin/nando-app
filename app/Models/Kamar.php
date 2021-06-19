<?php

namespace App\Models;

use CodeIgniter\Model;

class Kamar extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'kamars';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_kamar', 'luas', 'status', 'h_bulanan', 'h_mingguan', 'h_3bulan', 'h_6bulan', 'h_tahunan'];

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
			'h_bulanan' => $post['h_bulan'],
			'h_mingguan' => $post['h_minggu'],
			'h_3bulan' => $post['h_3bulan'],
			'h_6bulan' => $post['h_6bulan'],
			'h_tahunan' => $post['h_tahunan']
		];

		$this->insert($data);
	}

	public function ubah($post, $id)
	{
		$data = [
			'nama_kamar' => $post['nama'],
			'luas' => $post['luas'],
			'status' => 'available',
			'h_bulanan' => $post['h_bulan'],
			'h_mingguan' => $post['h_minggu'],
			'h_3bulan' => $post['h_3bulan'],
			'h_6bulan' => $post['h_6bulan'],
			'h_tahunan' => $post['h_tahunan']
		];

		$this->update($id, $data);
	}
}
