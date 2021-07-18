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
	protected $allowedFields        = ['id_booking', 'id_kamar', 'id_pel', 'tgl_bayar', 'nominal', 'due_date', 'status', 'denda', 'bulan'];

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

	public function getLastById($id)
	{
		return $this->db->table($this->table)
			->where('id_booking', $id)
			->orderBy($this->primaryKey, 'desc')->get()->getRowArray();
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
			'id_kamar' => $post['kamar'],
			'id_pel' => $post['pelanggan'],
			'tgl_bayar' => $post['checkin'],
			'nominal' => $booking['total'],
			'due_date' => $tgl2,
			'status' => 'pending',
			'bulan' => date('m', strtotime($post['checkin']))
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

	public function bayar($booking, $last)
	{
		if ($booking['harga_per'] == 'Mingguan') {
			$tgl1    = $last['due_date'];
			$tgl2    = date('ymd', strtotime('+7 day', strtotime($tgl1)));
		} elseif ($booking['harga_per'] == 'Bulanan') {
			$tgl1    = $last['due_date'];
			$tgl2    = date('ymd', strtotime('+1 month', strtotime($tgl1)));
		} else {
			$tgl1    = $last['due_date'];
			$tgl2    = date('ymd', strtotime('+1 year', strtotime($tgl1)));
		}

		$data = [
			'id_booking' => $last['id_booking'],
			'id_kamar' => $last['id_kamar'],
			'id_pel' => $last['id_pel'],
			'tgl_bayar' => $last['due_date'],
			'nominal' => $last['nominal'],
			'due_date' => $tgl2,
			'status' => 'pending',
			'bulan' => date('m', strtotime($last['due_date']))
		];

		$this->insert($data);
	}

	public function laporan($post)
	{
		return $this->db->table($this->table)
			->join('bookings', 'bookings.id_booking = payments.id_booking', 'left')
			->join('kamars', 'kamars.id_kamar = payments.id_kamar', 'left')
			->join('pelanggans', 'pelanggans.id_pel = payments.id_pel', 'left')
			->where('payments.status', $post['status'])
			->where('payments.tgl_bayar', $post['tglBayar'])
			->get()->getResultArray();
	}

	public function totalNominal($post)
	{
		return $this->db->table($this->table)->selectSum('nominal')
			->where('status', $post['status'])
			->get()->getRowArray();
	}
	public function totalDenda($post)
	{
		return $this->db->table($this->table)->selectSum('denda')
			->where('status', $post['status'])
			->get()->getRowArray();
	}

	// public function saldoNominalBulanLalu($post)
	// {
	// 	$tgl1    = $post['date'];
	// 	$tgl2    = date('ymd', strtotime('-1 month', strtotime($tgl1)));
	// 	// dd($tgl2);

	// 	return $this->db->table($this->table)->selectSum('nominal')
	// 		->where('status', 'success')
	// 		->where('due_date >=', $tgl2)
	// 		->get()->getRowArray();
	// }
	// public function saldoDendaBulanLalu($post)
	// {
	// 	$tgl1    = $post['date'];
	// 	$tgl2    = date('ymd', strtotime('-1 month', strtotime($tgl1)));
	// 	// dd($tgl2);

	// 	return $this->db->table($this->table)->selectSum('denda')
	// 		->where('status', 'success')
	// 		->where('due_date >=', $tgl2)
	// 		->get()->getRowArray();
	// }

	public function pendapatanKos($post)
	{
		return $this->db->table($this->table)->selectSum('nominal')
			->where("YEAR(tgl_bayar)", date('Y', strtotime($post['date'])))
			->where("MONTH(tgl_bayar)", date('m', strtotime($post['date'])))
			->where('status', 'success')
			->get()->getRowArray();
	}

	public function pendapatanKosTahunan($post)
	{
		return $this->db->table($this->table)->selectSum('nominal')->selectSum('denda')->select('tgl_bayar')
			->join('pelanggans', 'pelanggans.id_pel = payments.id_pel', 'left')
			->join('kamars', 'kamars.id_kamar = payments.id_kamar', 'left')
			->where("YEAR(tgl_bayar)", date('Y', strtotime($post['tahun'])))
			->where('payments.status', 'success')
			->groupBy('payments.bulan')
			->get()->getResultArray();
	}

	public function totalPendapatanTahunan($post)
	{
		return $this->db->table($this->table)->selectSum('nominal')->selectSum('denda')
			->where("YEAR(tgl_bayar)", date('Y', strtotime($post['tahun'])))
			->where('payments.status', 'success')
			->get()->getRowArray();
	}
}
