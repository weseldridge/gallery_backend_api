<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('Gallery_model');
	}

	public function index()
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery' // comes from rm ws from menu link.
			);
		$data['current_gallery'] = $this->top_gallery();
		$data['content'] = $this->get_main_content($data['current_gallery']['id']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		if($data['galleries'])
		{
			$this->load->view('gallery/main');
		} else {
			$this->load->view('gallery/main_blank');
		}
		$this->load->view('templates/footer');
	}

	private function get_user_gallery()
	{
		$galleries = $this->Gallery_model->get_with_userid($_SESSION['user_id']);

		if($galleries)
		{
			return $galleries;
		} else {
			return false;
		}
	}

	public function detail($id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['current_gallery'] = $this->Gallery_model->get($id);
		$this->load->model('Category_model');
		$data['categories'] = $this->Category_model->get_by_gallery($id);
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/main');
		$this->load->view('templates/footer');

	}

	private function get_main_content($id)
	{
		 return $this->Gallery_model->get($id);
	}

	private function top_gallery()
	{
		return $this->Gallery_model->get_oldest();
	}

	public function add_this_gallery()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->form_validation->set_rules('name', "Gallery Name", 'required');

			if(!$this->form_validation->run())
			{	
				$data['galleries'] = $this->get_user_gallery();
				$data['view_msg'] = array(
					'error_code' => '1001',
					'error_title' => 'Form Validation Fail',
					'msg' => 'Invalid form item',
					'type' => 'danger',
					'menu_active' => 'gallery', // comes from rm ws from menu link.
					);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar_gallery');
				$this->load->view('gallery/main_error');
				$this->load->view('templates/footer');
			} else {
				$gallery = array(
					'name' => $this->input->post('name')
					);

				$gallery = $this->Gallery_model->add($gallery);
				redirect('gallery/detail/' . $gallery['id']);
				
			}
		}
	}
}

