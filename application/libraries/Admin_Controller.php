<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = 'Conquer The Self';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('bcrypt');
		$this->load->model('users_model');

		// Login Check
		$exception_uris = array(
			'admin/users/login',
			'admin/users/logout',
			'admin/users/forgot_password',
			'admin/users/reset_password',
			'admin/migration'
		);
		
		$uri = $this->uri->segment(3) == 'reset_password' ? 'admin/users/reset_password' : uri_string();

		if (in_array($uri, $exception_uris) == FALSE)
		{
			if ($this->users_model->logged_in() == FALSE)
			{
				redirect('admin/users/login');
			}
		}
	}
}


/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */