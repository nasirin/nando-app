<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailKamar extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'detail_kamar';
	protected $primaryKey           = 'id_detail_kamar';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_kamar', 'waktu_sewa', 'biaya'];

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

	public function get($id = null)
	{
		if ($id) {
			return $this->db->table($this->table)
				->join('kamars', 'kamars.id_kamar = detail_kamar.id_kamar')
				->where('id_kamar', $id)
				->get()->getRowArray();
		} else {
			return $this->db->table($this->table)
				->join('kamars', 'kamars.id_kamar = detail_kamar.id_kamar')
				->orderBy('detail_kamar.id', 'desc')
				->get()->getResultArray();
		}
	}

	public function getBiaya($post)
	{
		return $this->db->table($this->table)
			->where('id_kamar', $post['kamar'])
			->where('waktu_sewa', $post['optionsRadios'])
			->get()->getRowArray();
	}
	public function simpan($post, $id)
	{
		$result = array();
		foreach ($post['waktu_sewa'] as $key => $value) {
			$result[] = array(
				'id_kamar' => $id,
				'waktu_sewa' => $post['waktu_sewa'][$key],
				'biaya' => $post['biaya'][$key],
			);
		}

		$this->insertBatch($result);
	}

	public function ubah($post, $id)
	{
		$result = array();
		foreach ($post['waktu_sewa'] as $key => $value) {
			$result[] = array(
				'waktu_sewa' => $post['waktu_sewa'][$key],
				'biaya' => $post['biaya'][$key],
			);
		}
		// $this->updateBatch($result, 'waktu_sewa');		
		$this->db->table($this->table)->where('id_kamar', $id)->updateBatch($result, 'waktu_sewa');
	}
}
