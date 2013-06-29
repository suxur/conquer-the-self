<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model');
	}

	// --------------------------------------------------------------------------

	public function index()
	{
		$this->data['pages'] = $this->pages_model->get_with_parent();
		
		$this->data['subview'] = 'admin/pages/index_view';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	// --------------------------------------------------------------------------

	public function order()
	{
		$this->data['sortable'] = TRUE;

		$this->data['subview'] = 'admin/pages/order_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------
	
	public function order_ajax()
	{
		if (isset($_POST['sortable']))
		{
			$this->pages_model->save_order($_POST['sortable']);
		}
		
		$this->data['pages'] = $this->pages_model->get_nested();
		$this->load->view('admin/pages/order_ajax_view', $this->data);
	}

	// --------------------------------------------------------------------------
	
	public function edit($id = NULL)
	{
		if ($id)
		{
			$this->data['page'] = $this->pages_model->get($id);
			count($this->data['page']) || $this->data['errors']['page'] = 'Page Could Not Be Found';

			if ( !empty($this->data['errors']['page']))
			{
				$this->data['page'] = $this->pages_model->get_new();
			}
		}
		else
		{
			$this->data['page'] = $this->pages_model->get_new();
		}

		// Pages for Dropdown
		$this->data['pages_no_parents'] = $this->pages_model->get_no_parents();

		$rules = $this->pages_model->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE)
		{
			$data = $this->pages_model->array_from_post(array(
				'title',
				'slug',
				'body',
				'template',
				'parent_id'
			));

			$this->pages_model->save($data, $id);
			redirect('admin/pages');
		}
		$this->data['subview'] = 'admin/pages/edit_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------
	
	public function delete($id)
	{
		$this->pages_model->delete($id);
		redirect('admin/pages');
	}

	// --------------------------------------------------------------------------

	public function _unique_slug($str)
	{
		$id = $this->uri->segment(4);
		$this->db->where('slug', $this->input->post('slug'));
		!$id || $this->db->where('id !=', $id);
		$page = $this->pages_model->get();

		if (count($page))
		{
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}

		return TRUE;
	}

}


/* End of file pages.php */
/* Location: ./application/controllers/pages.php */