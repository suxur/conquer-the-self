<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_images extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'image_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'filename' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			)
		));
		
		$this->dbforge->add_key('image_id', TRUE);
		$this->dbforge->create_table('images');
	}

	public function down()
	{
		$this->dbforge->drop_table('images');
	}
}