<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		 if($this->session->userdata('name')!="")
		 {
	      if($this->session->userdata('role')=="Admin"){
	        $menu['title'] = "Admin Dashboard";

	        $this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('dashboard',$menu);
			$this->load->view('common/footer');
	      }
	      else if($this->session->userdata('role')=="Doctor"){
	        $menu['title'] = "Doctor Dashboard";

	        $this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('dashboard',$menu);
			$this->load->view('common/footer');
	      }
	      else if($this->session->userdata('role')=="Receptionist")
	      {
	        $menu['title'] = "Receptionist Dashboard";
	        
	        $this->load->view('common/header');
			$this->load->view('common/nav');
			$this->load->view('dashboard',$menu);
			$this->load->view('common/footer');
	      }
	    }
	    else
	    {
	      redirect('users','refresh');
	    }
		
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */