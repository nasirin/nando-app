<?php

namespace App\Models;

use CodeIgniter\Model;

class Tambahan extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tambahans';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_booking', 'tambahan', 'biaya'];

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

	public function simpan($post, $booking)
	{
		$result = array();
		foreach ($post['tambahan'] as $key => $value) {
			$result[] = array(
				'id_booking' => $booking,
				'tambahan' => $post['tambahan'][$key],
				'biaya' => $post['biaya'][$key]
			);
		}
		$this->db->table($this->table)->insertBatch($result);
	}
}
