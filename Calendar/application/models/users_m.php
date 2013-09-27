<?php

Class Users_m extends CI_Model{

	function validate(){
		$this->db->where('email', $this->input->post('email'));//This gets whatever the user typed into the email textbox
		$this->db->where('password', sha1($this->input->post('password')));
		$query = $this->db->get('users');

		if($query->num_rows == 1){
			return true;
		}
	}

}