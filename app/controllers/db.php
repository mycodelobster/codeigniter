<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Db extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function create_user()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('users');
		$fields = array(
			'uid' => array('type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE),
			'username' => array('type' => 'VARCHAR', 'constraint' => '50'),
			'password' => array('type' => 'VARCHAR', 'constraint' => '50'),
			'email' => array('type' => 'VARCHAR', 'constraint' => '200')
			);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('uid', TRUE);
		if($this->dbforge->create_table('users'))
		{
			exit('TRUE');
		}
		exit('FALSE');
	}

}

/* End of file db.php */
/* Location: ./app/controllers/db.php */
