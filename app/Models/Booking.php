<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'bookings';
	protected $primaryKey           = 'id_booking';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_kamar', 'id_pel', 'harga_per', 'check_in', 'check_out', 'due_date_booking', 'total'];

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
				->join('pelanggans', 'pelanggans.id_pel = bookings.id_pel', 'left')
				->join('kamars', 'kamars.id_kamar = bookings.id_kamar', 'left')
				->where('bookings.id_booking', $id)
				->get()->getRowArray();
		} else {
			return $this->db->table($this->table)
				->join('kamars', 'kamars.id_kamar = bookings.id_kamar', 'left')
				->join('pelanggans', 'pelanggans.id_pel = bookings.id_pel', 'left')
				->orderBy('bookings.id_booking', 'desc')
				->get()->getResultArray();
		}
	}

	public function dueDateUpdate($post)
	{
		$data = [
			'due_date_booking' => $post['due_date'],
		];

		$this->update($post['id_booking'], $data);
	}

	public function invoice($id)
	{
		return $this->db->table($this->table)
			->join('pelanggans', 'pelanggans.id_pel = bookings.id_pel', 'left')
			->join('kamars', 'kamars.id_kamar = bookings.id_kamar', 'left')
			->where('bookings.id_booking', $id)
			->get()->getResultArray();
	}

	public function simpan($post, $kamar)
	{
		$data = [
			'id_kamar' => $post['kamar'],
			'id_pel' => $post['pelanggan'],
			'harga_per' => $post['optionsRadios'],
			'check_in' => $post['checkin'],
			'total' => $kamar['biaya']
		];

		$this->insert($data);
	}

	public function ubah($post, $kamar, $id)
	{
		$data = [
			'id_kamar' => $post['kamar'],
			'id_pel' => $post['pelanggan'],
			'harga_per' => $post['optionsRadios'],
			'check_in' => $post['checkin'],
			'total' => $kamar['biaya']
		];

		$this->update($id, $data);
	}

	public function getLast()
	{
		return $this->db->table($this->table)->orderBy($this->primaryKey, 'desc')->get()->getRowArray();
	}


	public function checkout($id)
	{
		$data = [
			'check_out' => date('ymd')
		];

		$this->update($id, $data);
	}
}
