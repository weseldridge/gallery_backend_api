<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index()
	{
		redirect('gallery');
	}

	public function add_this_category()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('name', "Gallery Name", 'required');
			$this->form_validation->set_rules('description', "Description", 'required');

			if($this->form_validation->run())
			{
				$category = array(
					'galleries_id' => $this->input->post('gallery_id'),
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					);

				$this->Category_model->add($category);

				redirect('gallery/detail/' . $this->input->post('gallery_id'));
			} else {
				redirect('gallery/detail/' . $this->input->post('gallery_id'));
			}
		}
	}


}