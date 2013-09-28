<?php

class Membership_m extends CI_Model {
	/**
	 * @return Query row
	 */
	function validate(){
		$salt = '';

		$this->db->select('salt');
		$this->db->from('users');
		$this->db->where('email', $this->input->post('email'));
		$saltQ = $this->db->get();

		if($saltQ->num_rows() > 0){
			$salt = $saltQ->row()->salt;//This will always retrun one result. So I get the row and then the salt from the row
		}

		$password = $salt . $this->input->post('password');

		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', sha1($password));
		$query = $this->db->get('users');
		
		return $query;
		
	}
	
	function create_member(){
		$id = uniqid('', false); //Gives a 13 character id
		$salt = uniqid('', true);
		
		$new_member_insert_data = array(
			'id' => $id,
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'salt' => $salt,
			'password' => sha1($salt . $this->input->post('password'))
		);
		
		$insert = $this->db->insert('users', $new_member_insert_data);
		return $insert;
	}
}