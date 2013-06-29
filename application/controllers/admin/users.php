<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------------

	public function index()
	{
		$this->data['users'] = $this->users_model->get();
		
		$this->data['subview'] = 'admin/users/index_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------

	public function edit($id = NULL)
	{
		if ($id)
		{
			$this->data['user'] = $this->users_model->get($id);
			count($this->data['user']) || $this->data['errors']['user'] = 'User Could Not Be Found';
			
			if ( !empty($this->data['errors']['user']))
			{
				$this->data['user'] = $this->users_model->get_new();
			}
		}
		else
		{
			$this->data['user'] = $this->users_model->get_new();
		}

		$rules = $this->users_model->rules_admin;
		
		$id || $rules['password']['rules'] .= '|required';
		
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		
		if ($this->form_validation->run() == TRUE)
		{
			$data = $this->users_model->array_from_post(array(
				'first_name',
				'last_name',
				'username',
				'email',
				'password',
				'ip_address'
			));
			
			$data['password'] = $this->bcrypt->hash($data['password']);
			$this->users_model->save($data, $id);
			redirect('admin/users');
		}

		$this->data['subview'] = 'admin/users/edit_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------
	
	public function delete($id)
	{
		$this->users_model->delete($id);
		redirect('admin/users');
	}

	// --------------------------------------------------------------------------

	public function login()
	{
		$dashboard = 'admin/dashboard';
		$this->users_model->logged_in() == FALSE || redirect($dashboard);

		$rules = $this->users_model->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE)
		{
			// We can login and redirect
			if ($this->users_model->login() == TRUE)
			{
				redirect($dashboard);
			}
			else
			{
				$this->session->set_flashdata('error', 'The username or password is incorrect. Please try again.');
				redirect('admin/users/login', 'refresh');
			}	
		}

		$this->data['subview'] = 'admin/users/login_view';
		$this->load->view('admin/_layout_modal', $this->data);
	}

	// --------------------------------------------------------------------------

	public function logout()
	{
		$this->users_model->logout();
		redirect('admin/users/login');
	}

	// --------------------------------------------------------------------------

	public function forgot_password()
	{
		if ($_POST)
		{
			$this->data['user'] = $this->users_model->forgot_password();
			$message = $this->load->view('admin/users/forgot_password_email_view', $this->data, TRUE);

			$this->load->library('email');
			$this->email->from('reset@conquertheself.com', 'Forgot Password - Conquer The Self');
			$this->email->to($this->data['user']['email']);
			$this->email->subject('Reset Password - Conquer The Self');
			$this->email->message($message);	

			$this->email->send();

			$this->session->set_flashdata('success', 'Password request has been sent. Please check your email.');
			redirect('admin/users/login', 'refresh');
		}
		
		$this->data['subview'] = 'admin/users/forgot_password_view';
		$this->load->view('admin/_layout_modal', $this->data);
	}

	// --------------------------------------------------------------------------

	public function reset_password($hash = NULL)
	{
		if ($_POST)
		{
			$rules = $this->users_model->rules_password;
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == TRUE)
			{
				$data = $this->users_model->array_from_post(array('id', 'first_name', 'last_name', 'username', 'email', 'password', 'ip_address'));
				$data['password'] = $this->bcrypt->hash($data['password']);
				
				$this->users_model->save($data, $data['id']);

				$this->session->set_flashdata('success', 'Success! Password successfully changed.');
				redirect('admin/users/login', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('error', 'Oops! Passwords do not match. Please try again.');
				redirect('admin/users/reset_password/' . $hash, 'refresh');
			}
		}

		$confirm = $this->users_model->reset_password($hash);

		if (count($confirm))
		{
			$this->data['user'] = $confirm;

			$this->data['subview'] = 'admin/users/reset_password_view';
			$this->load->view('admin/_layout_modal', $this->data);
		}
		else
		{			
			$this->session->set_flashdata('error', 'Oops! That link has expired. Please request another.');
			redirect('admin/users/login');
		}
	}

	// --------------------------------------------------------------------------

	public function _unique_email($str)
	{
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id !=', $id);
		$user = $this->users_model->get();

		if (count($user))
		{
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}

		return TRUE;
	}
}


/* End of file users.php */
/* Location: ./application/controllers/users.php */