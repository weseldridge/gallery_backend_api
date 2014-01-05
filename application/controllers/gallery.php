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
		
	}

}