<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load Stuff
		$this->load->model('pages_model');
		$this->load->model('articles_model');

		$this->load->helper('form');

		$this->data['menu'] = $this->pages_model->get_nested();
		$this->data['news_archive_link'] = $this->pages_model->get_archive_link();
		$this->data['meta_title'] = $this->config->item('site_name');
	}
}


/* End of file Frontend_Controller.php */
/* Location: ./application/core/Frontend_Controller.php */