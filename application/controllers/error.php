<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------------

	public function index()
	{
		$this->output->set_status_header('404');
		add_meta_title('404 - Page Not Found');

		$this->data['subview'] = 'error_404_view';
		$this->load->view('_layout_main', $this->data);
	}
}


/* End of file error.php */
/* Location: ./application/controllers/error.php */