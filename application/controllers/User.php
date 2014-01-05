<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('User_model');
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
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer');
	}


	/* ----------------------------------------------------------------
	*	Method - signin()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Sign in loads the view 'User/signin'.
	*/
	public function signin()
	{

		$data['view_msg'] = array(
						'error_id' => '0',
						);
		$this->load->view('templates/header');
		// $this->load->view('templates/sidebar');
		$this->load->view('user/signin');
		$this->load->view('templates/footer');
		
	}

	public function sign_me_in()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$this->form_validation->set_rules('username', "Username", 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run())
			{
				$user = $this->validate_user($this->input->post('username'),
									  $this->input->post('password'));

				if($user)
				{
					$this->set_session($user);
					redirect('dashboard');
				} else {
					$data['view_msg'] = array(
						'error_id' => '1001',
						'type' => 'danger',
						'msg' => 'Username or Password is incorrect!'
						);
					$this->load->view('templates/header');
					// $this->load->view('templates/sidebar');
					$this->load->view('user/signin', $data);
					$this->load->view('templates/footer');
				}
			}
		}
	}

	/* ----------------------------------------------------------------
	*	Method - logout()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Unsets session and redirects to signin
	*	form.
	*/
	public function logout()
	{
		$this->unset_session();
		redirect('User/signin');

	}
	

	/* ----------------------------------------------------------------
	*	Method - create_user()
	*  ----------------------------------------------------------------
	*	Takes no arguments. Loads form data into the the user/create
	*	view. Presents the view. Only userlevel = 1 (admin) can create
	*	new users.
	*/
	public function create()
	{

		$data['view_msg'] = array(
				'error_id' => '0'
				);
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
		return $this->User_model->get_user($username, $password);
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
	*/
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
	}

	/* ----------------------------------------------------------------
	*	Method - add_new_user()
	*  ----------------------------------------------------------------
	*	Takes one arguments.  
	*/
	public function add_new_user()
	{

		if($_SERVER['REQUEST_METHOD'] !== "POST")
		{
			$data['view_msg'] = array(
				'error_id' => '2001', // Bad request type
				'type' => 'danger',
				'msg' => 'Wrong request type.',
				);
			$this->load->view('templates/header');
			$this->load->view('user/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->form_validation->set_rules('display_name','Display Name','required');
			$this->form_validation->set_rules('user_name','Usermame','required|min_length[6]|max_length[20]|is_unique[users.username]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[20]|matches[confirm_password]');

			if($this->form_validation->run())
			{
				$user = array(
					'display_name' => $this->input->post('display_name'),
					'username' => $this->input->post('user_name'),
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'userlevel' => $this->input->post('user_level'),
					);

				$this->User_model->add($user);

				redirect('category');

			} else {

				$data['view_msg'] = array(
					'error_id' => '3001', // Bad form data
					'type' => 'warning',
					'msg' => 'Bad form data.',
				);

				$this->load->view('templates/header');
				$this->load->view('user/create', $data);
				$this->load->view('templates/footer');

			}
		}
	}

	/* ----------------------------------------------------------------
	*	Method - set_seesion()
	*  ----------------------------------------------------------------
	*	Takes one arguments - Sets the user session.
	*/
	private function set_session($user)
	{
		$_SESSION['signedin'] = 1;
		$_SESSION['username'] = $user['username'];
		$_SESSION['userlevel'] = $user['userlevel'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['user_id'] = $user['id'];
	} 

	/* ----------------------------------------------------------------
	*	Method - unset_seesion()
	*  ----------------------------------------------------------------
	*	Takes no arguments - Unsets the user session.
	*/
	private function unset_session()
	{
		unset($_SESSION['signedin']);
		unset($_SESSION['username']);
		unset($_SESSION['userlevel']);
		unset($_SESSION['email']);
		unset($_SESSION['user_id']);
	} 
	

	
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */