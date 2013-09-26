<?php

Class Login extends CI_Controller{

	function index(){
		/*This is where the login page will be shown*/
		$this->load->helper(array('form_helper', 'url_helper'));
		$this->load->view('login');
	}

	function validate_credentials(){

	}

	function new_user(){

	}
}


/*End of php file home.php*/
/*Location: ./application/controllers/home.php*/