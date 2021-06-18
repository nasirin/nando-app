<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'admins';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_adm', 'email', 'password', 'level', 'img_adm'];

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
			return $this->db->table($this->table)->where($this->primaryKey, $id)->orderBy($this->primaryKey, 'desc')->get()->getRowArray();
		}
		return $this->db->table($this->table)->orderBy($this->primaryKey, 'desc')->get()->getResultArray();
	}

	public function store($post, $img)
	{
		$data = [
			'nama_adm' => $post['nama'],
			'email' => $post['email'],
			'password' => hash('md5', $post['password']),
			'level' => $post['level'],
			'img_adm' => $img
		];

		$this->insert($data);
	}

	public function ubah($post, $img, $id)
	{
		$data = [
			'nama_adm' => $post['nama'],
			'email' => $post['email'],
			'password' => hash('md5', $post['password']),
			'level' => $post['level'],
			'img_adm' => $img
		];

		$this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
	}
}
