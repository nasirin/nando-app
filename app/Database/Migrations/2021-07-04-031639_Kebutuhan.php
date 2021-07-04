<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kebutuhan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kebutuhan' => ['type' => 'int', 'auto_increment' => true],
			'kebutuhan' => ['type' => 'varchar', 'constraint' => '50'],
			'tanggal' => ['type' => 'date'],
			'biaya' => ['type' => 'int', 'constraint' => '16'],
			'note' => ['type' => 'varchar', 'constraint' => '255'],
		]);

		$this->forge->addKey('id_kebutuhan', true);
		$this->forge->createTable('kebutuhans');
	}

	public function down()
	{
		//
	}
}
