<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'auto_increment' => true],
			'nama_pel' => ['type' => 'varchar', 'constraint' => '30'],
			'notelp' => ['type' => 'varchar', 'constraint' => '16'],
			'alamat' => ['type' => 'varchar', 'constraint' => '255'],
			'tgl_lahir' => ['type' => 'date'],
			'pekerjaan' => ['type' => 'varchar', 'constraint' => '20'],
			'jk' => ['type' => 'enum', 'constraint' => ['LK', 'PR']],
			'img_ktp' => ['type' => 'varchar', 'constraint' => '50'],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('pelanggans');
	}

	public function down()
	{
		//
	}
}
