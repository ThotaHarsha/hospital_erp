<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

	public function create()
	{
		$name=$this->input->post('username');
		$email=$this->input->post('email');
		$role=$this->input->post('role');
		$password=MD5(SHA1(MD5($this->input->post('password'))));
		$data=array(
          'username'=>$name,
          'email'=>$email,
          'password'=>$password,
          'usertype'=>$role,
          'status'=>1
		);
		$query=$this->db->query("SELECT email from user where email='$email'");
		if($query->num_rows()>0)
		{
			$this->session->set_flashdata('failed','Email already Exists');
			redirect('users','refresh');
		}
		else{
			$q1=$this->db->insert('user',$data);
			if($this->db->affected_rows()==1)
			{
				$this->session->set_flashdata('success','Successfully registered');
				redirect('users','refresh');
			}
			else{
                $this->session->set_flashdata('failed','Failed to register');
                redirect('users/register','refresh');
			}
		}
	}

	public function check_login()
	{
		$email=$this->input->post('email');
		$password=MD5(SHA1(MD5($this->input->post('password'))));
        
        if($email!="" && $password!="")
        {
        	$query=$this->db->query("SELECT * from user where email='$email' and password='$password'");
        	
        	if($query->num_rows()>0)
        	{
        		$row=$query->row();
        		$name=$row->username;
        		$role=$row->usertype;
        		$id=$row->id;

	          	$arraydata = array(
		            'id' => $id,
		            'name' => $name,
		            'role'  => $role
		          );
                $this->session->set_userdata($arraydata);

                $lastLogin = array('last_login'=>date('Y-m-d H:i:s'));
	          	$this->db->where('id',$row->id);
	          	$this->db->update('user',$lastLogin);

	          	if($this->db->affected_rows() >0){
                 redirect('dashboard','refresh');
              	} 
         	    else{
                 redirect('dashboard','refresh');
                }

        	}
        	else{
        		$this->session->set_flashdata('failed',"User doesn\'t exists");
                redirect('users','refresh');
        	}
        }
        else
        {
    		$this->session->set_flashdata('failed',"User doesn\'t exists");
            redirect('users','refresh');
    	}
	}

}

/* End of file Users_m.php */
/* Location: ./application/models/Users_m.php */