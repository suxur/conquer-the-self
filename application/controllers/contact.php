<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
		$this->load->library('form_validation');
	}

	// --------------------------------------------------------------------------

	public function index()
	{
		$this->data['subview'] = 'contact_view';
		$this->load->view('_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------
	
	public function send()
	{
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|alpha|required|xss_clean'
			),
			array(
				'field' => 'email',
				'label' => 'e-mail',
				'rules' => 'trim|required|valid_email|xss_clean'
			),
			array(
				'field' => 'comments',
				'label' => 'comments',
				'rules' => 'trim|required|xss_clean'
			)
		);
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'success'  => 'false',
				'name'     => form_error('name'),
				'email'	   => form_error('email'),
				'comments' => form_error('comments')
			);
			
			echo json_encode($data);
		} 
		else 
		{	
			$name 		= $_POST['name'];
			$email 		= $_POST['email'];
			$comments 	= $_POST['comments'];

			$this->email->from($email, $name);
			$this->email->to('contact@conquertheself.com');
			$this->email->subject( $name . ' - Contact Us - Conquer The Self');
			$this->email->message($comments);	

			$this->email->send();

			$data = array(
				'success' => 'true'
			);
			
			echo json_encode($data);
		}
	}
}


/* End of file contact.php */
/* Location: ./application/controllers/contact.php */