<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index()
	{
		$data['categories'] = $this->Category_model->get_all();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('category/_view', $data);
		$this->load->view('templates/footer');

	}

	public function detail($id)
	{

	}

	public function add()
	{
		if($_SERVER['REQUEST_METHOD'] !== 'POST')
		{
			redirect('category');
		}
		else
		{
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[20]|is_unique[categories.name]');

			if ($this->form_validation->run() == FALSE)
			{
				$data['categories'] = $this->Category_model->get_all();
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('category/_view', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$item = array(
					'name'=>$this->input->post('name'),
					);

				$this->Category_model->add($item);

				redirect('category');
			}	
		}
	}
}