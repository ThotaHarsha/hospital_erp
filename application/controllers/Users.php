<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
    }
	public function index()
	{
		if($this->input->post('submit'))
		{
			$this->users_m->check_login();
		}
		$this->load->view('users/login');
	}

	public function register()
	{
		if($this->input->post('submit'))
		{
          $this->users_m->create();
		}
		$this->load->view('users/register');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users','refresh');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */