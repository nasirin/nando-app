<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'auto_increment' => true],
			'id_kamar' => ['type' => 'int', 'constraint' => '16'],
			'id_pel' => ['type' => 'int', 'constraint' => '16'],
			'harga_per' => ['type' => 'varchar', 'constraint' => '20'],
			'check_in' => ['type' => 'date'],
			'check_out' => ['type' => 'date'],
			'total' => ['type' => 'int', 'constraint' => '16'],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('bookings');
	}

	public function down()
	{
		//
	}
}
