<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DueDate extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_dd' => ['type' => 'int', 'auto_increment' => true],
			'id_payment' => ['type' => 'int', 'constraint' => '16'],
			'due_date' => ['type' => 'date'],
			'status_dd' => ['type' => 'enum', 'constraint' => ['tenggang', 'telat']],
			'denda_dd' => ['type' => 'int', 'constraint' => '16', 'null' => true]
		]);

		$this->forge->addKey('id_dd', true);
		$this->forge->createTable('duedates');
	}

	public function down()
	{
		//
	}
}
