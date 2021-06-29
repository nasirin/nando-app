<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_payment' => ['type' => 'int', 'auto_increment' => true],
			'id_booking' => ['type' => 'int', 'constraint' => '16'],
			'tgl_bayar' => ['type' => 'date'],
			'nominal' => ['type' => 'int', 'constraint' => '16'],
			'due_date' => ['type' => 'date'],
			'status' => ['type' => 'enum', 'constraint' => ['tenggang', 'telat', 'success']],
			'denda' => ['type' => 'int', 'constraint' => '16'],
		]);

		$this->forge->addKey('id_payment', true);
		$this->forge->createTable('payments');
	}

	public function down()
	{
		//
	}
}
