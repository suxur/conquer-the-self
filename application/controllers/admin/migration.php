<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('migration');

		if ( ! $this->migration->current())
		{
			$this->data['success'] = FALSE;
			show_error($this->migration->error_string());
		}
		else
		{
			$this->data['success'] = TRUE;
			$this->session->set_flashdata('message', 'Migration completed successfully.');
		}
	}

	// TODO: IMPLEMENT A MIGRATION INTERFACE FOR ADMIN SECTION
	
	// public function index()
	// {
	// 	$migrations = $this->db->get('migrations')->row();
		
	// 	$this->data['tables'] = $this->db->list_tables();
	// 	$this->data['version'] = $migrations->version;
	// 	$this->data['subview'] = 'admin/migration/index';
	// 	$this->load->view('admin/_layout_main', $this->data);
	// }

	// public function run_migration()
	// {
	// 	$this->load->library('migration');

	// 	if ( ! $this->migration->current())
	// 	{
	// 		$this->data['success'] = FALSE;
	// 		show_error($this->migration->error_string());
	// 	}
	// 	else
	// 	{
	// 		$this->data['success'] = TRUE;
	// 		$this->session->set_flashdata('message', 'Migration completed successfully.');
	// 	}

	// 	$migrations = $this->db->get('migrations')->row();
		
	// 	$this->data['tables'] = $this->db->list_tables();
	// 	$this->data['version'] = $migrations->version;
	// 	$this->data['subview'] = 'admin/migration/index';
	// 	$this->load->view('admin/_layout_main', $this->data);

	// }

}


/* End of file migration.php */
/* Location: ./application/controllers/admin/migration.php */