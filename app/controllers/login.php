<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data['var'] = array();
		$this->load->view('layout/template',$data);		
	}

}

/* End of file login.php */
/* Location: .//E/webs/htdocs/codeigniter/app/core/login.php */
