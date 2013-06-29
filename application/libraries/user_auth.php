<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_auth {

	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	// Log In
	// --------------------------------------------------------------------------

	/**
	 * This method checks to see if user exists.
	 * If user does not exist then method returns FALSE..
	 * ..else the method sets user session data and
	 * returns the user_id.
	 *
	 * @param 	string		username
	 * @param 	string 		password
	 * @return 	mixed 		FALSE on failure, user_id on success
	 */

	public function log_in($username, $password)
	{
		$this->CI->db->select('admin_id, username, email, password')
					 ->from('admin')
					 ->where('username', $username);

		$query = $this->CI->db->get();

		if ($query->num_rows() !== 1)
		{
			return FALSE;
		}

		if ($this->_hash($password) === $query->row('password'))
		{
			$data = array(
				'id'		=> $query->row('admin_id'),
				'username'	=> $query->row('username'),
				'email'		=> $query->row('email'),
			);
			
			$this->CI->session->set_userdata($data);

			return $query->row('admin_id');
		}

		return FALSE;
	}
	
	// Log Out
	// --------------------------------------------------------------------------

	/**
	 * This method destroys the users session, and redirects to either the 
	 * index URL or a defined URL
	 * 
	 * @param 	string		url to redirect to:  controller/method
	 * @return 	void
	 */

	public function log_out($redirect = '')
	{
		$this->CI->session->sess_destroy();
		
		$this->CI->load->helper('url');

		redirect($redirect);
	}

	// --------------------------------------------------------------------------

	/**
	 * Logged In?
	 *
	 * This method checks to see if the user is logged in or not
	 *
	 * @return 	boolean 	
	 */

	public function is_logged_in()
	{
		if ( ! $this->CI->session->userdata('id'))
		{
			return FALSE;
		}
		
		return TRUE;
	}

	// --------------------------------------------------------------------------

	/**
	 * Create New User
	 *
	 * This function creates a new user.
	 *
	 * @param 	string		username
	 * @param 	string		password
	 * @param 	string		email address
	 * @return 	mixed		user_id
	 */

	public function create_user($username, $password, $email) 
	{
		$data = array(
			'username'		=> $username,
			'password'		=> $this->_hash($password),
			'email'			=> $email,
		);

		$this->CI->db->insert('admin', $data);

		return $this->CI->db->insert_id();
	}

	// --------------------------------------------------------------------------

	/**
	 * Change Password
	 *
	 * This method updates the users password
	 *
	 * @return void
	 */

	public function change_password($password)
	{
		$password = $this->_hash($password);

		$this->CI->db->where('admin_id', $this->CI->session->userdata('id'))
					 ->set('password', $password)
					 ->update('admin');

		$this->_delete_hash();
	}

	// --------------------------------------------------------------------------

	/**
	 * Reset Password
	 *
	 * This method resets the users password
	 *
	 * @return void
	 */

	public function reset_password($password, $admin_id)
	{
		$password = $this->_hash($password);

		$this->CI->db->where('admin_id', $admin_id)
					 ->set('password', $password)
					 ->update('admin');

		$this->_delete_hash();
	}

	// --------------------------------------------------------------------------

	/**
	 * Forgot Password
	 *
	 * This function first checks to see if the submitted email address
	 * actually exists.  If it doesn't return FALSE.
	 * If it does exist, generate the hash, insert it into the database 
	 * and pass the hash back to the controller to use when the user is emailed.
	 *
	 * @param 	string	email address
	 * @return 	mixed	FALSE if no email, otherwise an array
	 */

	public function forgot_password($email)
	{
		$this->CI->db->select('admin_id, username')
					 ->from('admin')
					 ->where('email', $email);
		
		$query = $this->CI->db->get();

		if ($query->num_rows() === 0)
		{			
			return FALSE;
		}

		$hash = $this->_create_salt();
		
		$data = array(
			'user_id'		=> $query->row('admin_id'),
			'hash'			=> $hash,
			'request_time'	=> time()
		);
		
		$this->CI->db->insert('password_request', $data);
		
		return array(
			'user_id'	=> $query->row('admin_id'),
			'username'	=> $query->row('username'),
			'hash'		=> $hash
		);
	}

	// --------------------------------------------------------------------------
	
	/**
	 * Create Hashed Password
	 *
	 * This function will create a hashed password with salt.
	 * 
	 * @return 	string		password
	 */

	protected function _hash($password)
	{
		$salt = $this->CI->config->item('encryption_key');
		return hash('sha512', $password . $salt);
	}

	// --------------------------------------------------------------------------

	/**
	 * Create Salt
	 *
	 * This function will create a salt hash.
	 * 
	 * @return 	string		the salt
	 */

	protected function _create_salt()
	{
		$this->CI->load->helper('string');
		return sha1(random_string('alnum', 32));
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
		
		$this->CI->db->where('request_time <', time() - $timeout)
					 ->delete('password_request');	
	}
}

/* End of file user_auth.php */
/* Location: ./application/libraries/user_auth.php */