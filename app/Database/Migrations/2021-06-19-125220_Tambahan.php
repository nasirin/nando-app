<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tambahan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'auto_increment' => true],
			'id_booking' => ['type' => 'int', 'constraint' => '16'],
			'tambahan' => ['type' => 'varchar', 'constraint' => '20'],
			'biaya' => ['type' => 'int', 'constraint' => '16'],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('tambahans');
	}

	public function down()
	{
		//
	}
}
