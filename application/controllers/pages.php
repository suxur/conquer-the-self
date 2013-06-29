<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------------

	public function index()
	{
		// Get the page where the slug matches the first URI segment
		$this->data['page'] = $this->pages_model->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
		
		// Either page exists or show a 404
		count($this->data['page']) || show_404(current_url());

		add_meta_title($this->data['page']->title);

		$method = '_' . $this->data['page']->template;
		
		if (method_exists($this, $method))
		{
			$this->$method() === TRUE ? $this->data['subview'] = $this->data['page']->template . '_view' : $this->data['subview'] = $this->data['page']->template . '_error_view';
		}
		else
		{
			log_message('error', 'Could not load template ' . $method . ' in file ' . __FILE__ . ' at line ' . __LINE__);
			show_error('Could not load template ' . $method);
		}

		$this->load->view('_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------

	private function _page()
	{
		$this->data['recent_articles'] = $this->articles_model->get_recent();
		return TRUE;
	}

	// --------------------------------------------------------------------------

	private function _homepage()
	{
		$this->data['staff_picks'] = $this->articles_model->get_staff_picks();

		$meta = '<meta name="keywords" content="naturopathy, healing foods, organic, organic foods, raw, nature, zen, conquer, self">' . PHP_EOL;
		$meta .= '<meta name="description" content="A website featuring naturopathy and the belief in healing foods.">';
		$this->data['meta_data'] = $meta;

		$this->db->join('articles_category', 'articles_category.id = articles.id');
		$this->db->join('categories', 'articles_category.category_id = categories.category_id');
		$this->articles_model->set_published();
		$this->db->limit(9);
		$this->data['articles'] = $this->articles_model->get(NULL, FALSE, TRUE);

		empty($this->data['articles']) == TRUE ? $condition = FALSE : $condition = TRUE;

		return $condition;
	}

	// --------------------------------------------------------------------------

	private function _archive()
	{
		$category = $this->uri->segment(1);

		$meta = '<meta name="keywords" content="naturopathy, healing foods, organic, organic foods, raw, nature, zen, conquer, self">' . PHP_EOL;
		$meta .= '<meta name="description" content="A website featuring naturopathy and the belief in healing foods.">';
		$this->data['meta_data'] = $meta;

		if ($category != 'articles')
		{
			$this->db->join('articles_category', 'articles_category.id = articles.id');
			$this->db->join('categories', 'articles_category.category_id = categories.category_id');
			$this->db->where('category', $category);
			$this->articles_model->set_published();
			$count = $this->db->count_all_results('articles');

			$perpage = 4;
			
			if ($count > $perpage)
			{
				$this->load->library('pagination');
				$config['base_url'] = site_url($this->uri->segment(1) . '/');
				$config['total_rows'] = $count;
				$config['per_page'] = $perpage; 
				$config['uri_segment'] = 2; 
				$this->pagination->initialize($config); 
				$this->data['pagination'] = $this->pagination->create_links();
				$offset = $this->uri->segment(2);
			}
			else
			{
				$this->data['pagination'] = '';
				$offset = 0;
			}
			
			$this->db->join('articles_category', 'articles_category.id = articles.id');
			$this->db->join('categories', 'articles_category.category_id = categories.category_id');
			$this->articles_model->set_published();
			$this->db->limit($perpage, $offset);
			$this->data['articles'] = $this->articles_model->get_by(array('category' => $category), '', TRUE);
		}
		else
		{
			$this->articles_model->set_published();
			$count = $this->db->count_all_results('articles');

			$perpage = 4;
			
			if ($count > $perpage)
			{
				$this->load->library('pagination');
				$config['base_url'] = site_url($this->uri->segment(1) . '/');
				$config['total_rows'] = $count;
				$config['per_page'] = $perpage; 
				$config['uri_segment'] = 2; 
				$this->pagination->initialize($config); 
				$this->data['pagination'] = $this->pagination->create_links();
				$offset = $this->uri->segment(2);
			}
			else
			{
				$this->data['pagination'] = '';
				$offset = 0;
			}

			$this->articles_model->set_published();
			$this->db->limit($perpage, $offset);
			$this->data['articles'] = $this->articles_model->get(NULL, FALSE, TRUE);
		}

		$this->data['featured'] = $this->articles_model->get_featured();

		empty($this->data['articles']) == TRUE ? $condition = FALSE : $condition = TRUE;		
		return $condition;
	}

	public function disclaimer()
	{
		$this->data['recent_articles'] = $this->articles_model->get_recent();

		$this->data['subview'] = 'disclaimer_view';
		$this->load->view('_layout_main', $this->data);
	}

	public function privacy_policy()
	{
		$this->data['recent_articles'] = $this->articles_model->get_recent();

		$this->data['subview'] = 'privacy_policy_view';
		$this->load->view('_layout_main', $this->data);
	}
}


/* End of file pages.php */
/* Location: ./application/controllers/pages.php */