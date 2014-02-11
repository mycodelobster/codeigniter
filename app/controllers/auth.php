<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model','auth');
	}
	
	public function index()
	{
		
	}

	public function login()
	{
		$this->form_validation->generate('username','password');
		if($this->form_validation->run()==TRUE)	
		{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			if($this->auth->login($username, $password)) 
			{
				redirect(base_url('dashboard'));
			}
			else
			{
				set_error('Login Failed');
				redirect(base_url('url'));
			}
		}
		$this->load->view('login');	
	}

	public function signup()
	{
		$this->form_validation->generate('username','password','email');
		if($this->form_validation->run()==TRUE)
		{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$email = $this->input->post('email',TRUE);
			if($this->auth->signup($username, $password, $email))
			{
				set_success('Success');
				redirect(base_url('signup'));
			}
		}
		$this->laod->view('signup');
	}

	public function logout()
	{
		
	}

	public function forgot()
	{
		
	}

}

/* End of file auth.php */
/* Location: ./app/controllers/auth.php */
