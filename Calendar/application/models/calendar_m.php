<?php

Class Calendar_m extends CI_Model{

	function get_user_appointments($user_id){
		$this->db->where('user_id', $user_id);
		return $this->db->get('appointments');
	}

}