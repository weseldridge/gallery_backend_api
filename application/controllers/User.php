<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
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
		redirect('user/user_dash');
	}

	/* ----------------------------------------------------------------
	*	Method - user_dash()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Loads user data into the the user/dashboard
	*	view. Presents the view.
	*/
	public function user_dash()
	{

		$data['user_data'] = ''; //$this->user_data();

		$this->load->view('user/dashboard', $data);
	}


	/* ----------------------------------------------------------------
	*	Method - signin()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Sign in loads the view 'User/signin'.
	*/
	public function signin()
	{

		$data['message'] = '';
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/signin');
		$this->load->view('templates/footer');
		
	}

	/* ----------------------------------------------------------------
	*	Method - logout()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Unsets session and redirects to signin
	*	form.
	*/
	public function logout()
	{
		//unset($_SESSION['username']);
		redirect('User/signin');

	}
	

	/* ----------------------------------------------------------------
	*	Method - create_user()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Loads form data into the the user/create
	*	view. Presents the view. Only userlevel = 1 (admin) can create
	*	new users.
	*/
	public function create_user()
	{

		$data['user_data'] = ''; 
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/create', $data);
		$this->load->view('templates/footer');

	}

	/* ----------------------------------------------------------------
	*	Method - change_password()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Loads change_password view.
	*/
	public function change_password()
	{

		$data['user_data'] = ''; //$this->user_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/change_password', $data);
		$this->load->view('templates/footer');
	}

	/* ----------------------------------------------------------------
	*	Method - change_email()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Loads change_password view.
	*/
	public function change_email()
	{
		$data['user_data'] = ''; //$this->user_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/change_email', $data);
		$this->load->view('templates/footer');
	}


	/* ----------------------------------------------------------------
	*	Method - validate_user()
	*  ----------------------------------------------------------------
	*	Takes two arguments - $username and $password. If the user is 
	*	valid the method will return the user, if not valid it will
	*	return false.
	*/
	private function validate_user($username, $password)
	{
		$user = false; //$this->User_model->get_user($username, sha1($password));

		if($user == null)
		{
			return false;
		}
		else
		{
			return $user;
		}
	}

	/* ----------------------------------------------------------------
	*	Method - user_data()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Pulls user name from session, returns that 
	*	user from data base, and builds use page data.
	*
	private function user_data()
	{
		$user = $this->User_model->get_user();

		return array(
			'display_name' => $user['display_name'],
			'user_name' => $user['username'],
			'email' => $user['email']
			'user_level' => '';//$this->user_level($user['userlevel']);
			);
	} */

	/* ----------------------------------------------------------------
	*	Method - user_level()
	*  ----------------------------------------------------------------
	*	Takes one arguments - The user level. Returns a string that is
	* 	user level. 
	*
	private function user_level($user_level)
	{
		$text_level = '';
		switch ($user_level) 
		{
			case "1":
				$text_level = 'Admin';
				break;
			case "2":
				$text_level = 'Site Admin';
				break;
			default:
				$text_level = 'None User';
				break;
		}
		return $text_level;
	} */

	/* ----------------------------------------------------------------
	*	Method - add_new_user()
	*  ----------------------------------------------------------------
	*	Takes one arguments.  
	*
	public function add_new_user()
	{
		if(!isset($_SESSION['username'])
		{
			redirect('user/signin');
		}
		elseif($_SESSION['userlevel'] !== '1')
		{
			redirect('user/dashboard');
		}

		if($_SERVER['REQUEST_METHOD'] !== "POST")
		{
			$data['user_data'] = $this->user_data();
			$data['message'] = array(
				'msg' => 'Wrong request type and/or bad form data',
				'type' => $this->config->item['ERROR'];
				)
			$this->load=>view('User/create', $data);
		}
		else
		{
			$data = $this->input-post();
			$this->User_model->add_user($data);

			redirect('dashboard');
		}
	} */

	/* ----------------------------------------------------------------
	*	Method - set_seesion()
	*  ----------------------------------------------------------------
	*	Takes one arguments - Sets the user session. Returns a string that is
	* 	user level. 
	*
	private function set_seesion($user)
	{
		// $_SESSION['username'] = $user['username'];
		// $_SESSION['userlevel'] = $user['userlevel'];
		// $_SESSION['email'] = $user['email']
	} */

	/* ----------------------------------------------------------------
	*	Method - set_seesion()
	*  ----------------------------------------------------------------
	*	Takes one arguments - Sets the user session. Returns a string that is
	* 	user level. 
	*
	public function update_user_from_form($update_type)
	{
		if($_SERVER['REQUEST_METHOD'] !== "POST")
		{
			$data['user_data'] = $this->user_data();
			$data['message'] = array(
				'msg' => 'Wrong request type and/or bad form data',
				'type' => $this->config->item['ERROR'];
				)
			$this->load=>view('User/dashboard', $data);
		}
		else
		{
			$data = $this->input-post();
			switch ($update_type) {
				case 'email':
				$this->User_model->update_user_field($_SESSION['username'],'email', $data['email']);
				break;
				case 'password':
				$this->User_model->update_user_field($_SESSION['username'],'password', sha1($data['password']));
				break;
				default:
				break;
			}
		}
	} */

	
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */