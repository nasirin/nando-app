<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => ['type' => 'int', 'auto_increment' => true],
			'nama_adm' => ['type' => 'varchar', 'constraint' => '30'],
			'email' => ['type' => 'varchar', 'constraint' => '50'],
			'password' => ['type' => 'varchar', 'constraint' => '50'],
			'level' => ['type' => 'enum', 'constraint' => ['admin', 'manager']],
			'img_adm' => ['type' => 'varchar', 'constraint' => '50'],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('admins');
	}

	public function down()
	{
		//
	}
}
