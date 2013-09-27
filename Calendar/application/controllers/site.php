<?php

	Class Site extends CI_Controller{

		function logged_in(){
			$this->load->view('calendar');
		}

	}