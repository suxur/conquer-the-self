<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------------

	public function index()
	{
		$this->load->model('articles_model');
		
		$this->db->order_by('modified desc');
		$this->db->limit(5);
		$this->data['recent_articles'] = $this->articles_model->get();
		
		$this->data['subview'] = 'admin/dashboard/index_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------
	
	public function modal()
	{
		$this->load->view('admin/_layout_modal', $this->data);
	}
}


/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */ 