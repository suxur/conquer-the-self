<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_username_to_users extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '25',
			)
		));

		$this->dbforge->add_column('users', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'username');
	}
}