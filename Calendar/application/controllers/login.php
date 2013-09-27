<?php

Class Login extends CI_Controller{

	function index(){
		/*This is where the login page will be shown*/
		$this->load->view('login');
	}

	function validate_credentials(){
		$this->load->model('users_m');
		$query = $this->users_m->validate();

		if($query){
			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => true
			);

			$this->session->set_userdata($data);
			redirect('site/logged_in');
		}//If $query is true

		else{
			$this->index();//Load the login form again if they didn't get to login.
		}
	}

	function new_user(){
		$this->load->view('new_user_form');
	}

	function create_member(){

	}
}


/*End of php file home.php*/
/*Location: ./application/controllers/home.php*/