<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['recent_news'] = $this->articles_model->get_recent();
	}

	public function index()
	{
		if (isset($_POST['search']) && $_POST['search'] != '')
		{
			$search = $_POST['search'];
			$this->db->like('title', $search);
			$this->data['articles'] = $this->articles_model->get(NULL, FALSE, TRUE);

			empty($this->data['articles']) == TRUE ? $view = 'search_error_view' : $view = 'search_view';
		
			$this->data['recent_articles'] = $this->articles_model->get_recent();

			$this->data['subview'] = $view;
			$this->load->view('_layout_main', $this->data);
		}
		else
		{
			redirect('/', 'refresh');
		}
	}
}


/* End of file search.php */
/* Location: ./application/controllers/search.php */