<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'auto_increment' => true],
			'no_kamar' => ['type' => 'int'],
			'nama_kamar' => ['type' => 'varchar', 'constraint' => '20'],
			'luas' => ['type' => 'varchar', 'constraint' => '10'],
			'status' => ['type' => 'enum', 'constraint' => ['available', 'booked']],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('kamars');
	}

	public function down()
	{
		//
	}
}
