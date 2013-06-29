<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends Admin_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// Load Models
		$this->load->model('articles_model');
		$this->load->model('images_model');
		$this->load->model('categories_model');
	}
	
	// --------------------------------------------------------------------------

	public function index()
	{
		// Get All Articles
		$this->data['articles'] = $this->articles_model->get();
		
		$this->data['subview'] = 'admin/articles/index_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------	

	public function edit($id = NULL)
	{
		// Get an article or set a new one
		if ($id)
		{
			$this->db->join('articles_category', 'articles_category.id = articles.id');
			$this->db->join('categories', 'articles_category.category_id = categories.category_id');
			$this->data['article'] = $this->articles_model->get($id, TRUE, TRUE);
			count($this->data['article']) || $this->data['errors']['article'] = 'Article Could Not Be Found';
			
			if ( !empty($this->data['errors']['article']))
			{
				$this->data['article'] = $this->articles_model->get_new();
			}
		}
		else
		{
			$this->data['article'] = $this->articles_model->get_new();
		}

		// Set up form and validation
		$rules = $this->articles_model->rules;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<span>', '</span>');

		// Process the form
		if ($this->form_validation->run() == TRUE)
		{	
			$data = $this->articles_model->array_from_post(array(
				'title',
				'slug',
				'body',
				'tags',
				'featured',
				'staff_pick',
				'pubdate',
				'author'
			));

			// Save article and set article ID
			$article_id = $this->articles_model->save($data, $id);
			
			// Save category
			$category = $this->articles_model->array_from_post(array('category_id'));
			$category['id'] = $article_id;
			$this->categories_model->save($category, $id);
			
			// Save filename
			$image = $this->articles_model->array_from_post(array('filename'));
			$image['id'] = $article_id;
			$this->images_model->save($image, $id);
			
			redirect('admin/articles');
		}
		
		$this->data['subview'] = 'admin/articles/edit_view';
		$this->load->view('admin/_layout_main', $this->data);
	}

	// --------------------------------------------------------------------------

	public function delete($id)
	{
		$this->articles_model->delete($id);
		redirect('admin/articles');
	}

	// --------------------------------------------------------------------------

	public function upload_crop()
	{
		$config['max_size']		 = '2048';
		$config['max_width']	 = '1024';
		$config['max_height']	 = '1024';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['upload_path']	 = 'img/uploads/';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$result = array(
				'msg' 	  => $this->upload->display_errors('', ''),
				'success' => 'false'
			);

			echo json_encode($result);
		}
		else
		{
			$data = $this->upload->data();
			
			$path   = $data['full_path'];
			$file   = $data['file_name'];
			$width  = $data['image_width'];
			$height = $data['image_height'];

			$master_dim = ($width > $height ? 'height' : 'width');
			$this->_resize($path, 300, 300, $master_dim);

			$result = array(
				'msg' 	  => $file,
				'success' => 'true'
			);

			echo json_encode($result);
		}
	}

	// --------------------------------------------------------------------------

	public function upload()
	{
		$config['max_size']		 = '2048';
		$config['max_width']	 = '1024';
		$config['max_height']	 = '1024';
		$config['upload_path']	 = 'img/uploads/articles/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$result = array(
				'msg' 	  => $this->upload->display_errors('', ''),
				'success' => 'false'
			);

			echo json_encode($result);
		}
		else
		{
			$data = $this->upload->data();

			$path   = $data['full_path'];
			$file   = $data['file_name'];
			$width  = $data['image_width'];
			$height = $data['image_height'];

			if ($width > 610)
			{
				$this->_resize($path, 610, $height, 'width');
			}

			$result = array(
				'msg' 	  => $file,
				'path' 	  => $path,
				'success' => 'true'
			);

			echo json_encode($result);
		}
	}

	// --------------------------------------------------------------------------

	public function crop()
	{
		if($_POST)
		{
			$width  = $_POST['w'];
			$height = $_POST['h'];
			$x_axis = $_POST['x1'];
			$y_axis = $_POST['y1'];
			$file   = $_POST['file'];

			$this->load->library('image_lib'); 

			$config['width']			= $width;
			$config['height']			= $height;
			$config['x_axis']			= $x_axis;
			$config['y_axis']			= $y_axis;
			$config['source_image']		= './img/uploads/' . $file;
			$config['overwrite']        = TRUE;
			$config['maintain_ratio']	= FALSE;

			$this->image_lib->initialize($config); 
			$this->image_lib->crop();

			$this->_thumbnail('./img/uploads/' . $file, 170, 170, './img/uploads/thumbs/');
			
			// TODO Need to set another thumbnail for the recent column.
			// $this->_thumbnail('./img/uploads/' . $file, 170, 170, './img/uploads/thumbs/');

			echo json_encode($file);
		}
	}

	// --------------------------------------------------------------------------

	private function _resize($path, $width, $height, $master_dim)
	{
		$this->load->library('image_lib'); 

		$config['source_image']		= $path;
		$config['maintain_ratio'] 	= TRUE;
		$config['master_dim']		= $master_dim;
		$config['width']			= $width;
		$config['height']			= $height;
		
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();	
	}

	// --------------------------------------------------------------------------

	private function _thumbnail($path, $width, $height, $newPath)
	{
		$this->load->library('image_lib'); 

		$config['source_image']		= $path;
		$config['new_image'] 		= $newPath;
		$config['maintain_ratio'] 	= TRUE;
		$config['master_dim']		= 'width';
		$config['width']			= $width;
		$config['height']			= $height;
		
		$this->image_lib->initialize($config); 
		$this->image_lib->resize();	
	}
}


/* End of file articles.php */
/* Location: ./application/controllers/articles.php */