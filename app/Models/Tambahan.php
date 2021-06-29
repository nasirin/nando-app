<?php

namespace App\Models;

use CodeIgniter\Model;

class Tambahan extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tambahans';
	protected $primaryKey           = 'id_tambahan';
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

	public function getAllData($id)
	{
		return $this->db->table($this->table)->distinct()
			->join('bookings', 'bookings.id_booking = tambahans.id_booking', 'left')
			->where('bookings.id_booking', $id)
			->groupBy('tambahan')
			->get()->getResultArray();
	}

	public function simpan($post, $booking)
	{
		// $result = array();
		// foreach ($post['tambahan'] as $key => $value) {
		// 	$result[] = array(
		// 		'id_booking' => $booking,
		// 		'tambahan' => $post['tambahan'][$key],
		// 		'biaya' => $post['biaya'][$key]
		// 	);
		// 	$this->insertBatch($result);
		// }

		$data = [];
		$tmp_data = [
			'id_booking' => $booking,
			'tambahan' => $post['tambahan'],
			'biaya' => $post['biaya']
		];
		foreach ($tmp_data as $k => $v) {
			for ($i = 0; $i < count($post['tambahan']); $i++) {
				$data[$i][$k] = $v[$i];
			}

			$this->insertBatch($data);
		}
	}

	public function ubah($post, $booking)
	{
		$result = array();
		foreach ($post['tambahan'] as $key => $value) {
			$result[] = array(
				'tambahan' => $post['tambahan'][$key],
				'biaya' => $post['biaya'][$key]
			);
		}
		$this->db->table($this->table)->where('id_booking', $booking)->updateBatch($result, 'tambahan');
	}
}
