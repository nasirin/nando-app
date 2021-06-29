<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'payments';
	protected $primaryKey           = 'id_payment';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_booking', 'tgl_bayar', 'nominal', 'due_date', 'status', 'denda'];

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


	public function get($id)
	{
		return $this->db->table($this->table)
			->where('id_booking', $id)
			->get()->getResultArray();
	}

	public function getDate($id)
	{
		return $this->db->table($this->table)
			->where('id_booking', $id)
			->get()->getRowArray();
	}

	public function getData()
	{
		return $this->db->table($this->table)
			->join('bookings', 'bookings.id_booking = payments.id_booking', 'left')
			->get()->getResultArray();
	}

	public function nominal($id)
	{
		return $this->db->table($this->table)->selectSum('nominal')
			->where('id_booking', $id)
			->where('status !=', 'success')
			->get()->getRowArray();
	}

	public function denda($id)
	{
		return $this->db->table($this->table)->selectSum('denda')
			->where('id_booking', $id)
			->where('status', 'telat')
			->get()->getRowArray();
	}

	public function simpan($post, $booking)
	{
		if ($post['optionsRadios'] == 'Mingguan') {
			$tgl1    = $post['checkin'];
			$tgl2    = date('ymd', strtotime('+7 days', strtotime($tgl1)));
		} elseif ($post['optionsRadios'] == 'Bulanan') {
			$tgl1    = $post['checkin'];
			$tgl2    = date('ymd', strtotime('+1 months', strtotime($tgl1)));
		} else {
			$tgl1    = $post['checkin'];
			$tgl2    = date('ymd', strtotime('+1 years', strtotime($tgl1)));
		}

		$data = [
			'id_booking' => $booking['id_booking'],
			'tgl_bayar' => $post['checkin'],
			'nominal' => $booking['total'],
			'due_date' => $tgl2,
			'status' => 'pending',
		];

		$this->insert($data);
	}

	public function ubah($post, $booking)
	{
		if ($post['optionsRadios'] == 'Mingguan') {
			$tgl1    = $post['checkin'];
			$tgl2    = date('ymd', strtotime('+7 days', strtotime($tgl1)));
		} elseif ($post['optionsRadios'] == 'Bulanan') {
			$tgl1    = $post['checkin'];
			$tgl2    = date('ymd', strtotime('+1 months', strtotime($tgl1)));
		} else {
			$tgl1    = $post['checkin'];
			$tgl2    = date('ymd', strtotime('+1 years', strtotime($tgl1)));
		}

		$data = [
			'tgl_bayar' => $post['checkin'],
			'nominal' => $booking['total'],
			'due_date' => $tgl2,
			'status' => 'pending',
		];

		$this->db->table($this->table)->where('id_booking', $booking['id_booking'])->update($data);
	}

	public function updateStatusTelat($pay)
	{
		$data = [
			'status' => 'telat',
			'denda' => 20000
		];

		$this->update($pay['id_payment'], $data);
	}

	public function updateStatusSuccess($pay)
	{
		$data = [
			'status' => 'success',
		];

		$this->update($pay['id_payment'], $data);
	}

	public function updateStatusChekout($id)
	{
		$data = [
			'status' => 'checkout',
		];

		$this->db->table($this->table)->where('id_booking', $id)->update($data);
	}

	public function bayar($booking, $pay)
	{
		if ($booking['harga_per'] == 'Mingguan') {
			$tgl1    = $pay['due_date'];
			$tgl2    = date('ymd', strtotime('+7 days', strtotime($tgl1)));
		} elseif ($booking['harga_per'] == 'Bulanan') {
			$tgl1    = $pay['due_date'];
			$tgl2    = date('ymd', strtotime('+1 months', strtotime($tgl1)));
		} else {
			$tgl1    = $pay['due_date'];
			$tgl2    = date('ymd', strtotime('+1 years', strtotime($tgl1)));
		}

		$data = [
			'id_booking' => $pay['id_booking'],
			'tgl_bayar' => $pay['due_date'],
			'nominal' => $pay['nominal'],
			'due_date' => $tgl2,
			'status' => 'pending',
		];

		$this->insert($data);
	}
}
