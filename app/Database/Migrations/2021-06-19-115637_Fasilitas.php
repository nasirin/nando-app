<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fasilitas extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'auto_increment' => true],
			'fasilitas' => ['type' => 'varchar', 'constraint' => '20'],
			'biaya' => ['type' => 'int', 'constraint' => '16', 'null' => true],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('fasilitas');
	}

	public function down()
	{
		//
	}
}
