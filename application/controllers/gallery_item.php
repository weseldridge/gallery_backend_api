<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_item extends CI_Controller {



	function __construct()
	{
		parent::__construct();
		$this->load->model('Gallery_model');
		//session_start();
	}

	/* ----------------------------------------------------------------
	*	Method - index()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Redirects to to signin if $_SESSION['username']
	*	is not set. If session is set then user is redirected to the user
	*	account dashboard.
	*/
	public function index()
	{
		$data['items'] = $this->Gallery_model->get_all();
		$data['message'] = '';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gallery/_view',$data);
		$this->load->view('templates/footer');	
	}

	/* ----------------------------------------------------------------
	*	Method - add()
	*  ----------------------------------------------------------------
	*	Takes no arguments.
	*/
	public function add()
	{
		$data['message'] = '';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gallery/add_view');
		$this->load->view('templates/footer');
	}

	/* ----------------------------------------------------------------
	*	Method - add_new_gallery_item()
	*  ----------------------------------------------------------------
	*	Takes no arguments.
	*/
	public function add_new_gallery_item()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data = array(
				'title' => $this->input->post('title'),
				'caption' => $this->input->post('caption'),
				'url' => $this->input->post('url'),
				'price' => $this->input->post('price'),
				'is_sold' => $this->input->post('is_sold')
				);

			$this->load->model('Gallery_model');
			$this->Gallery_model->add($data);

			redirect('gallery_item');

		}
		else
		{
			redirect('gallery_item');
		}

	}

	/* ----------------------------------------------------------------
	*	Method - edit()
	*  ----------------------------------------------------------------
	*	Takes one arguments. 
	*/
	public function edit($id)
	{
		$data['gallery_item'] = $this->Gallery_model->get($id);
		$data['message'] = '';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gallery/edit_view', $data);
		$this->load->view('templates/footer');
	}

	/* ----------------------------------------------------------------
	*	Method - edit_gallery_item()
	*  ----------------------------------------------------------------
	*	Takes one arguments. 
	*/
	public function edit_gallery_item($id)
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$data = array(
				'id' => $id,
				'title' => $this->input->post('title'),
				'caption' => $this->input->post('caption'),
				'url' => $this->input->post('url'),
				'price' => $this->input->post('price'),
				'is_sold' => $this->input->post('is_sold')
				);

			$this->load->model('Gallery_model');
			$this->Gallery_model->update($data);

			redirect('gallery_item');

		}
		else
		{
			redirect('gallery_item');
		}

	}
	/* ----------------------------------------------------------------
	*	Method - delete()
	*  ----------------------------------------------------------------
	*	Takes one arguments. 
	*/
	public function delete($id)
	{
		$data['message'] = '';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gallery/delete_view');
		$this->load->view('templates/footer');
	}

	/* ----------------------------------------------------------------
	*	Method - view()
	*  ----------------------------------------------------------------
	*	Takes one arguments.
	*/
	public function view($id)
	{
		$data['item'] = $this->Gallery_model->get($id);
		$data['message'] = '';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('gallery/item_view', $data);
		$this->load->view('templates/footer');
	}
}

/* End of file Gallery_item.php */
/* Location: ./application/controllers/Gallery_item.php */