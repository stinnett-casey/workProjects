<?php

	Class Site extends CI_Controller{

		function logged_in(){
			$appt_array = array();
			$appt_array['array'] = array();
			//Load calendar model
			$this->load->model('calendar_m');
			//Query for all appointments
			$appointments = $this->calendar_m->get_user_appointments($this->session->userdata('id'));
			//Load all appointments into a variable
			if($appointments->num_rows() > 0){
				foreach ($appointments->result() as $row) {
					$appt_array['array'][$row->date] = $row->memo;					
				}
			}//end if
			//Create the page
			$this->load->view('calendar', $appt_array);
		}

	}