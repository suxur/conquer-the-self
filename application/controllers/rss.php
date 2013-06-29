<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rss extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('xml');
		$this->load->helper('text');
	}

	public function index()
	{
		header("Content-Type: application/rss+xml");

		$data['title'] = $this->config->item('site_name'); 
		$data['link'] = site_url('rss');
		$data['description'] = 'Insight into the way organic food, exercise and a sound mind can heal the body naturally.';
		$data['articles'] = $this->articles_model->get();

		$this->load->view('templates/rss_view', $data);
	}

}

/* End of file rss.php */
/* Location: ./application/controllers/rss.php */	