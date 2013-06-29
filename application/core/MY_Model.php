<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public $rules = array();
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_timestamps = FALSE;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function array_from_post($fields)
	{
		$data = array();
		foreach ($fields as $field)
		{
			$data[$field] = $this->input->post($field);
		}

		return $data;
	}
	
	/**
	 * Get
	 *
	 * This method gets either a single row by the 'id' or 'get_by' method
	 * or multiple results by the 'id' or 'get_by' method.
	 *
	 * @param	int 		$id
	 * @param	bool 		$single
	 * @return 	object 		row or results
	 */
	public function get($id = NULL, $single = FALSE, $article = FALSE)
	{
		if ($article == TRUE)
		{
			$this->db->join('images', 'images.id = articles.id');
		}
		
		if ($id != NULL)
		{
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif ($single == TRUE)
		{
			$method = 'row';
		}
		else
		{
			$method = 'result';
		}

		if (!count($this->db->ar_orderby))
		{
			$this->db->order_by($this->_order_by);
		}

		return $this->db->get($this->_table_name)->$method();
	}
	
	/**
	 * Get By
	 *
	 * This method allows the 'Get' method to return a result
	 * by a where statement from the user. 
	 *
	 * @param	string 		$where
	 * @param	bool 		$single
	 * @return 	object 		row or result
	 */
	public function get_by($where, $single = FALSE, $article = FALSE)
	{
		$this->db->where($where);

		return $this->get(NULL, $single, $article);
	}

	/**
	 * Save
	 *
	 * This method creates a timestamp if '_timestamps' is set to true
	 * and inserts a new entry if there is not an 'id' set
	 * or it will update the entry associated with the id.
	 *
	 * @param	array 	$data
	 * @param	int 	$id
	 * @return 	int 	$id
	 */
	public function save($data, $id = NULL)
	{
		// Set Timestamps
		if ($this->_timestamps == TRUE)
		{
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}

		// Insert
		if ($id === NULL)
		{
			// !isset($data[$this->_primary_key]) || $data[$this->_primary_key = NULL];
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		// Update
		else
		{
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}

		return $id;
	}

	/**
	 * Delete
	 *
	 * This method checks to make sure an 'id' is passed
	 * and then deletes the entry associated with the id.
	 *
	 * @param	int 	$id
	 * @return 	mixed 	If no id returns false, else return void
	 */
	public function delete($id)
	{
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if ( ! $id)
		{
			return FALSE;
		}

		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */