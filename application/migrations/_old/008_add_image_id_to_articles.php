<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_image_id_to_articles extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'image_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			)
		));

		$this->dbforge->add_column('articles', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('articles', 'image_id');
	}
}