<?php

namespace App\Models;

use CodeIgniter\Model;

class Kebutuhan extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'kebutuhans';
	protected $primaryKey           = 'id_kebutuhan';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['kebutuhan', 'tanggal', 'biaya', 'note'];

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

	public function store($post)
	{
		$data = [
			'kebutuhan' => $post['keterangan'],
			'tanggal' => $post['tanggal'],
			'biaya' => $post['biaya'],
			'note' => $post['note']
		];

		$this->insert($data);
	}

	public function ubah($post, $id)
	{
		$data = [
			'kebutuhan' => $post['keterangan'],
			'tanggal' => $post['tanggal'],
			'biaya' => $post['biaya'],
			'note' => $post['note']
		];

		$this->update($id, $data);
	}

	public function laporan($post)
	{
		return $this->db->table($this->table)
			->where('MONTH(tanggal)', date('m', strtotime($post['date'])))
			->where('YEAR(tanggal)', date('Y', strtotime($post['date'])))
			->get()->getResultArray();
	}
	public function totalKebutuhan($post)
	{
		return $this->db->table($this->table)->selectSum('biaya')
			->where('MONTH(tanggal)', date('m', strtotime($post['date'])))
			->where('YEAR(tanggal)', date('Y', strtotime($post['date'])))
			->get()->getRowArray();
	}
}
