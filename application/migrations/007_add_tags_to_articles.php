<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tags_to_articles extends CI_Migration {

	public function up()
	{
		$fields = (array(
			'tag_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('tag_id');
		$this->dbforge->add_column('articles', $fields);


		$this->dbforge->add_field(array(
			'tag_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'tag' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			)
		));
		
		$this->dbforge->add_key('tag_id', TRUE);
		$this->dbforge->create_table('tag');
		

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			),
			'tag_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			)
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('tag_id');
		$this->dbforge->create_table('articles_tags');
	}	

	public function down()
	{
		$this->dbforge->drop_column('articles', 'tag_id');
		$this->dbforge->drop_table('tag');
		$this->dbforge->drop_table('articles_tags');
	}
}