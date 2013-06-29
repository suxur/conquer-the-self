<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_password_requests extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'hash' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'time' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			)
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('password_requests');
	}

	public function down()
	{
		$this->dbforge->drop_table('password_requests');
	}
}