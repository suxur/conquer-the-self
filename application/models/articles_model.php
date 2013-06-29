<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends MY_Model {

	protected $_table_name = 'articles';
	protected $_primary_key = 'articles.id';
	protected $_order_by = 'pubdate desc, articles.id desc';
	protected $_timestamps = TRUE;

	public $rules = array(

		'pubdate' => array(
			'field' => 'pubdate',
			'label' => 'publication date',
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		),
		'author' => array(
			'field' => 'author',
			'label' => 'author',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug',
			'label' => 'slug',
			'rules' => 'trim|required|max_length[100]|url_title|strtolower|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'body',
			'rules' => 'trim|required'
		),
		'tags' => array(
			'field' => 'tags',
			'label' => 'tags',
			'rules' => 'trim|xss_clean'
		)
	);

	public function get_new()
	{
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->tags = '';
		$article->filename = '';
		$article->featured = '';
		$article->staff_pick = '';
		$article->category_id = '';
		$article->pubdate = date('Y-m-d');
		$article->author = $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name');
		return $article;
	}

	public function set_published()
	{
		$this->db->where('pubdate <=', date('Y-m-d'));
	}

	public function get_recent($limit = 5)
	{
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}

	public function get_staff_picks($limit = 5)
	{
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get_by(array('staff_pick' => '1'));
	}

	public function get_featured($limit = 5)
	{
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get_by(array('featured' => '1'));
	}
}


/* End of file articles_model.php */
/* Location: ./application/models/articles_model.php */