<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends MY_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'first_name';
	protected $_timestamps = TRUE;

	public $rules = array(

		'username' => array(
			'field' => 'username',
			'label' => 'username',
			'rules' => 'trim|required|xss_clean'
		),
		
		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required'
		)
	
	);

	public $rules_password = array(

		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|required|matches[password_confirm]'
		),
		
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'password_confirm',
			'rules' => 'trim|required|matches[password]'
		)
	
	);

	public $rules_admin = array(
		'first_name' => array(
			'field' => 'first_name',
			'label' => 'first name',
			'rules' => 'trim|required|xss_clean'
		),
		'last_name' => array(
			'field' => 'last_name',
			'label' => 'last name',
			'rules' => 'trim|required|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'confirm password',
			'rules' => 'trim|matches[password]'
		),
		'ip_address' => array(
			'field' => 'ip_address',
			'label' => 'IP Address',
			'rules' => 'trim'
		)
	);


	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->get_by(array('username' => $username), TRUE);

		$verify = $this->bcrypt->verify($password, $user->password);

		if ($verify == TRUE)
		{
			// Log In User
			$data = array(
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'email' => $user->email,
				'username' => $user->username,
				'id' => $user->id,
				'loggedin' => TRUE
			);
			
			$this->session->set_userdata($data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function logged_in()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function forgot_password()
	{
		$user = $this->get_by(array('email' => $this->input->post('email')), TRUE);

		if ( ! count($user))
		{			
			$this->session->set_flashdata('error', 'That email address does not exist or is incorrect. Please try again.');
			redirect('admin/users/forgot_password', 'refresh');
			return FALSE;
		}

		$hash = $this->_create_salt();
		
		$data = array(
			'id'	=> $user->id,
			'hash'	=> $hash,
			'time'	=> time()
		);
		
		$this->db->insert('password_requests', $data);
		
		return array(
			'id'		=> $user->id,
			'username'	=> $user->username,
			'first_name'=> $user->first_name,
			'last_name'	=> $user->last_name,
			'email'		=> $user->email,
			'hash'		=> $hash
		);
	}

	public function reset_password($hash)
	{
		$this->_delete_hash();

		$this->db->join('users', 'users.id = password_requests.id');
		$confirm = $this->db->get_where('password_requests', array('hash' => $hash))->row();
		
		return $confirm;
	}

	public function get_new()
	{
		$user = new stdClass();
		$user->first_name = '';
		$user->last_name = '';
		$user->username = '';
		$user->email = '';
		$user->password = '';
		$user->ip_address = '';
		return $user;
	}

	public function hash($string)
	{
		return hash('sha512', $string . $this->config->item('encryption_key'));
	}
	
	// --------------------------------------------------------------------------

	/**
	 * Delete Expired Hashes
	 *
	 * This function will remove expired hashes 
	 * from the 'password_request' table
	 *
	 * @return void
	 */

	private function _delete_hash()
	{
		$timeout = 600;
		
		$this->db->delete('password_requests', array('time <' => time() - $timeout));	
	}

	// --------------------------------------------------------------------------

	/**
	 * Create Salt
	 *
	 * This function will create a salt hash.
	 * 
	 * @return 	string		the salt
	 */

	private function _create_salt()
	{
		$this->load->helper('string');
		return sha1(random_string('alnum', 32));
	}
}


/* End of file users_model.php */
/* Location: ./application/models/users_model.php */ 