<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	function __construct()
	{
		parent::__construct();
		session_start();
		if(!isset($_SESSION['username']))
		{
			redirect('user/signin');
		}
		$this->load->model('Gallery_model');
		$this->load->model('Category_model');
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function index()
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery' // comes from rm ws from menu link.
			);
		$data['current_gallery'] = $this->top_gallery();
		$data['gallery_id'] = $data['current_gallery']['id'];
		$data['categories'] = $this->Category_model->get_by_gallery($data['current_gallery']['id']);
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

	
	/**
	* This method is use to display views for a given gallery.
	* If takes a gallery id as a paramater from the uri string.
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return Null
	* @param Int id A gallery id
	*/
	public function detail($id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['current_gallery'] = $this->Gallery_model->get($id);
		$data['categories'] = $this->Category_model->get_by_gallery($id);
		$data['gallery_id'] = $data['current_gallery']['id'];
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/main');
		$this->load->view('templates/footer');

	}

	/**
	* This method is used to display views needed to edit
	* a category. It takes a category id and a gallery id
	* as paramater from the uri string.
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return Null
	* @param Int $cat_id|$gal_id A category id and a gallery id
	*/
	public function edit_category($cat_id, $gal_id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['category'] = $this->get_category($cat_id);
		$data['current_gallery'] = $this->Gallery_model->get($gal_id);
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);
		$data['category_items'] = $this->get_items($cat_id);
		$data['current_gallery_id'] = $gal_id;
		$data['gallery_id'] = $data['current_gallery']['id'];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/category_edit');
		$this->load->view('templates/footer');
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function add_item($cat_id, $gal_id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['category'] = $this->get_category($cat_id);
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);
		$data['category_items'] = $this->get_items('id');
		$data['gallery_id'] = $gal_id;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/add_item');
		$this->load->view('templates/footer');
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function edit_item($item_id, $cat_id, $gal_id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);
		$data['item'] = $this->get_item($item_id);
		$data['gallery_id'] = $gal_id;
		$data['category'] = $this->get_category($cat_id);
		$data['gallery_id'] = $data['current_gallery']['id'];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/edit_item');
		$this->load->view('templates/footer');
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function edit($id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['current_gallery'] = $this->Gallery_model->get($id);
		$data['gallery_id'] = $id;
		$data['categories'] = $this->Category_model->get_by_gallery($id);
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/main_edit');
		$this->load->view('templates/footer');
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function category($id, $gal_id)
	{
		$data['galleries'] = $this->get_user_gallery();
		$data['category'] = $this->get_category($id);
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery', // comes from rm ws from menu link.
			);
		$data['category_items'] = $this->get_items($id);
		$data['gallery_id'] = $gal_id;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');
		$this->load->view('gallery/category');
		$this->load->view('templates/footer');
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
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

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function add_this_item()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->form_validation->set_rules('name', 'Item Name', 'required');
			$this->form_validation->set_rules('description', 'Item Description', 'required');
			$this->form_validation->set_rules('price', 'Item Price', 'required');

			if($this->form_validation->run())
			{
				$config['upload_path'] = './img/gallery_item/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$config['encrypt_name'] = 'true';

				$this->load->library('upload', $config);

				if($this->upload->do_upload())
				{
					$upload_data = $this->upload->data();

					$item = array(
						'name' => $this->input->post('name'),
						'description' => $this->input->post('description'),
						'price' => $this->input->post('price'),
						'is_sold' => $this->input->post('is_sold'),
						'resource_url' => $upload_data['file_name']
						);

					$this->load->model('Item_model');
					$this->Item_model->add($item, $this->input->post('cat_id'));
					redirect('gallery');
				} else {
					echo "Did not pass upload";
					echo $this->upload->display_errors('<p>', '</p>');
				}

			} else {
				echo "Did not pass form vale";
			}
		} else {
			echo "Not a post resquest";
		}
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function update_this_user()
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
					'id' => $this->input->post('gallery_id'),
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description')
					);

				$gallery = $this->Gallery_model->update($gallery);
				redirect('gallery/detail/' . $gallery['id']);
			}
		}
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function update_this_category()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$category = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				);
			$this->load->model('Category_model');
			$this->Category_model->update($category);
			redirect('gallery');
		} else {
			redirect('gallery');
		}
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
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

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function update_this_item()
	{

	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function toggle($id)
	{
		$this->Gallery_model->toggle_active($id);
		redirect('gallery/detail/' . $id);
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function get_category($id)
	{
		$this->load->model('Category_model');
		return $this->Category_model->get($id);
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function get_items($cat_id)
	{
		$this->load->model('Item_model');
		return $this->Item_model->get_by_category($cat_id);
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	public function get_item($item_id)
	{
		$this->load->model('Item_model');
		return $this->Item_model->get($item_id);
	}

	/**
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return
	* @param
	*/
	private function get_main_content($id)
	{
		 return $this->Gallery_model->get($id);
	}

	/**
	* This method is used to return the oldest gallery
	* in the database. It does not support multi users.
	*
	* @todo Make multi user
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return Array The oldest gallery
	* @param Null
	*/
	private function top_gallery()
	{
		return $this->Gallery_model->get_oldest();
	}

	/**
	* This function is called anytime you need to build
	* a page using the startard template. You can pass
	* in an array of optional paramaters. These include
	* $cal_id the catagory id and $gal_id the gallery
	* id.
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return Array An array for building a normal page
	* @param Array options Takes an optional array for building page data
	*/
	private function page_date($options = array())
	{

		$data = array();

		$data['galleries'] = $this->get_user_gallery();
		$data['view_msg'] = array(
			'error_code' => '0',
			'menu_active' => 'gallery' // comes from rm ws from menu link.
			);
		$data['current_gallery'] = $this->top_gallery();
		$data['gallery_id'] = $data['current_gallery']['id'];
		$data['categories'] = $this->Category_model->get_by_gallery($data['current_gallery']['id']);
		$data['content'] = $this->get_main_content($data['current_gallery']['id']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_gallery');

		return $data;
	}	

	/**
	* This method is used to fetch galleries for a user. If they exist the method
	* will return an array of galleries or if the user does not have any galleries
	* it will return false.
	*
	* @author Wesley Eldridge <weseldridge@gmail.com>
	* @return array|bool A array of galleries if not galleries exist for user will return false.
	* @param Null
	*/
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

}

