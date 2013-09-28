<?php

Class Login extends CI_Controller{

	function index(){
		$data['error'] = '';
		/*This is where the login page will be shown*/
		$this->load->view('login', $data);
	}

	function validate_credentials(){
		$this->load->model('membership_m');
		$query = $this->membership_m->validate();

		if($query->num_rows() == 1){
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => true,
				'id' => $query->row()->id
			);

			$this->session->set_userdata($data);
			redirect('site/logged_in');
		}//If $query is true(Has something in it)

		else{
			$data['error'] = 'Whoops! Either your username or password was wrong. Or maybe you need to create an account?';
			$this->load->view('login', $data);//Load the login form again if they didn't get to login.
		}
	}

	function new_user(){
		$this->load->view('new_user_form');
	}

	function create_member(){

		$this->form_validation->set_rules('first_name', 'First name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password_confirm]|sha1');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|sha1');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('new_user_form');
		}
		else{
			$this->load->model('membership_m');
			
			if($query = $this->membership_m->create_member()){
				$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
				redirect('site/logged_in');
			}
			else			{
				$this->load->view('new_user_form');			
			}
		}



	}
}


/*End of php file home.php*/
/*Location: ./application/controllers/home.php*/