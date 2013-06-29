<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['recent_articles'] = $this->articles_model->get_recent();
	}

	// --------------------------------------------------------------------------

	public function article($id, $slug)
	{
		$this->articles_model->set_published();
		$this->data['article'] = $this->articles_model->get($id, FALSE, TRUE);

		count($this->data['article']) || show_404(uri_string());

		$requested_slug = $this->uri->segment(3);
		$set_slug = $this->data['article']->slug;
		
		if ($requested_slug != $set_slug)
		{
			redirect('articles/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
		}

		add_meta_title($this->data['article']->title);
		get_meta_data($this->data['article']);
		
		$this->data['subview'] = 'article_view';
		$this->load->view('_layout_main', $this->data);
	}
}


/* End of file articles.php */
/* Location: ./application/controllers/articles.php */